<?php

/**
 * @file
 * Core functions for Sites module.
 */

/**
 * Get all defined sites.
 *
 * @return
 *   Associative array of "sid" => {id, title, purl_prefix, front_page}.
 */
function _sites_get_sites() {
  $sites = array();

  $q = 'SELECT * FROM {sites}';
  $res = db_query($q);

  foreach ($res as $row) {
    $sites[$row->sid] = $row;
  }

  return $sites;
}

/**
 * Get a single site.
 *
 * @param $sid
 *   Unique site id.
 *
 * @return
 *   Site object.
 */
function _sites_get_site($sid) {
  if (!empty($sid)) {
    $res = db_query_range('SELECT * FROM {sites} s WHERE s.sid = :sid', 0, 1, array(':sid' => $sid));

    foreach ($res as $obj) {
      if ($obj === FALSE) {
        return NULL;
      }
      else {
        return new site($obj->title, $obj->purl_prefix, $obj->name, $obj->front_page, $obj->menu_main_menu, $obj->menu_secondary_menu, $obj->sid);
      }
    }

  }
  else {
    return NULL;
  }
}

/**
 * Delete a single site.
 *
 * @param $sid
 *   Unique site id.
 */
function _sites_delete_site($sid) {
  db_delete('sites')
  ->condition('sid', $sid)
  ->execute();
  db_delete('site_node')
  ->condition('sid', $sid)
  ->execute();

  // delete PURL prefix
  purl_delete(array(
    'provider' => 'sites',
    'id' => $sid,
  ));
}

/**
 * Get the current site id.
 *
 * @return
 *   Unique site id.
 */
function sites_get_current_sid() {
  return context_get('sites', 'sid');
}

/**
 * Get the current site.
 *
 * @return
 *   Site object.
 */
function sites_get_current_site() {
  return unserialize(context_get('sites', 'site'));
}

/**
 * Invoked by PURL.
 */
function sites_set_current_site($sid) {
  // Activate the Context module context condition
  if ($plugin = context_get_plugin('condition', 'site')) {
    $plugin->execute($sid);
  }

  // Make the sid and full site object easily available to other functionality
  $site = _sites_get_site($sid);
  context_set('sites', 'sid', $sid);
  context_set('sites', 'site', serialize($site));

  // Handle per-site front page overrides
  if (!empty($site->front_page)) {
    if ($_GET['q'] == variable_get('site_frontpage', 'node')) {
      $_GET['q'] = $site->front_page; // This will require module weights to be set appropriately
      // Alternate method: drupal_goto($site->front_page);
    }
  }
}

/**
 * Clear all records in site_node for a given nid, then re-add the
 * current set of site/node relationships.
 *
 * @param $nid
 *   Unique node id.
 *
 * @param $sids
 *   Array of unique site ids.
 *
 * @return
 *   Boolean - TRUE if all queries execute successfully, FALSE otherwise.
 */
function _sites_attach_node_to_sites($nid, $sids) {
  $q = 'DELETE FROM {site_node} WHERE nid = %d';
  db_delete('site_node')
  ->condition('nid', $nid)
  ->execute();

  $success = TRUE;
  foreach ($sids as $sid) {
    $q = 'INSERT INTO {site_node} (nid, sid) VALUES (%d, %d)';
    if ($id = db_insert('site_node')
  ->fields(array(
      'nid' => $nid,
      'sid' => $sid,
    ))
  ->execute() == FALSE) {
      $success = FALSE;
    }
  }
  return $success;
}

/**
 * Get all sites a node belongs to.
 *
 * @param $nid
 *   Unique node id.
 *
 * @return $sites
 *   Array of site objects.
 */
function sites_get_node_sites($nid) {
  $q = 'SELECT * FROM {site_node} WHERE nid = %d';
  $res = db_query('SELECT * FROM {site_node} WHERE nid = :nid', array(':nid' => $nid));
  $sites = array();
  foreach ($res as $site) {
    $sites[$site->sid] = $site;
  }

  return $sites;
}

/**
 * Get the unique name of the menu to be used in place of the menu specified
 * in the $menu_name argument (right now, can only be main_menu or
 * secondary_menu).
 *
 * @param $menu_name
 *   Either 'main_menu' or 'secondary_menu'.
 *
 * @return
 *   If the requested menu is set, its name is returned.  Otherwise, FALSE.
 */
function sites_get_current_menu_source($menu_name) {
  $current_site = sites_get_current_site();
  if (!empty($current_site->{'menu_' . $menu_name})) {
    return $current_site->{'menu_' . $menu_name};
  }
  return FALSE;
}
