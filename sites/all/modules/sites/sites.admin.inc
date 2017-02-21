<?php

/**
 * @file
 * Admin pages for Sites module.
 */

/**
 * Provide variables to theme_sites_list_sites().
 */
function sites_preprocess_sites_list_sites(&$vars) {
  $sites = $vars['sites'] = _sites_get_sites();
  if (!empty($sites)) {
    $vars['header'] = array(t('Site title'), t('Path'), t('Operations'));
    $rows = array();
    foreach ($sites as $sid => $site) {
      $links = array(
        'edit' => array(
          'title' => t('edit'),
          'href' => 'admin/structure/sites/edit/' . $site->sid,
        ),
        'delete' => array(
          'title' => t('delete'),
          'href' => 'admin/structure/sites/delete/' . $site->sid,
        ),
      );
      $operations = theme('links', array('links' => $links, 'attributes' => array('class' => 'links inline')));
      $rows[] = array($site->title, $site->purl_prefix, $operations);
    }
    $vars['rows'] = $rows;
  }
}

/**
 * Theme a Sites admin landing page.
 */
function theme_sites_list_sites($vars) {
  $output = '';
  if (!empty($vars['sites'])) {
    $output .= theme('table', array('header' => $vars['header'], 'rows' => $vars['rows']));
  }
  else {
    $output .= t('You currently have no sites.');
  }
  return $output;
}

/**
 * Add/edit sites form.
 */
function sites_site_form($form, &$form_state, $site_id = NULL) {
  $site = NULL;
  if (!$site_id) {
    $site = new site();
  }
  else {
    $site = _sites_get_site($site_id);
  }

  $form = array();

  $form['title'] = array(
    '#title' => 'Site title (used in administrative interface only)',
    '#type' => 'textfield',
    '#default_value' => $site->title,
  );

  $form['front_page'] = array(
    '#title' => 'Front page',
    '#description' => 'Leave blank to use sitewide frontpage',
    '#type' => 'textfield',
    '#default_value' => $site->front_page,
  );

  $form['site_name'] = array(
    '#title' => 'Site name',
    '#description' => 'Used by some themes.  Will be visible to users.',
    '#type' => 'textfield',
    '#default_value' => $site->name,
  );

  $form['main_menu'] = array(
    '#title' => 'Main menu',
    '#description' => 'Unique menu name of the menu to insert into $main_menu (leave blank to use default Main menu)',
    '#type' => 'textfield',
    '#default_value' => $site->menu_main_menu,
  );

  $form['secondary_menu'] = array(
    '#title' => 'Secondary menu',
    '#description' => 'Unique menu name of the menu to insert into $secondary_menu (leave blank to use default Secondary menu)',
    '#type' => 'textfield',
    '#default_value' => $site->menu_secondary_menu,
  );

  // Add context prefix form
  $form['purl'] = purl_form('sites', $site_id, $site->purl_prefix);

  $form['site_id'] = array(
    '#type' => 'hidden',
    '#value' => $site_id,
  );

  $form['actions']['#type'] = 'actions';
  $form['actions']['submit'] = array(
    '#value' => t('Save'),
    '#type' => 'submit',
  );
  if ($site_id) {
    $form['actions']['delete'] = array(
      '#markup' => l(t('Delete'), 'admin/structure/sites/delete/' . $site_id),
    );
  }
  $form['actions']['cancel'] = array(
    '#markup' => l(t('Cancel'), 'admin/structure/sites'),
  );

  return $form;
}

/**
 * Add/edit site submit handler.
 */
function sites_site_form_submit($form, &$form_state) {
  if ($form_state['values']['site_id'] == 0) {
    $site = new site();
  }
  else {
    $site = _sites_get_site($form_state['values']['site_id']);
  }

  $site->title = $form_state['values']['title'];
  $site->front_page = $form_state['values']['front_page'];
  $site->name = $form_state['values']['site_name'];
  $site->menu_main_menu = $form_state['values']['main_menu'];
  $site->menu_secondary_menu = $form_state['values']['secondary_menu'];

  if (isset($form_state['values']['purl']['value'])) {
    $site->purl_prefix = $form_state['values']['purl']['value'];
  }

  $site->save();
  $form_state['redirect'] = 'admin/structure/sites';
}

/**
 * Delete sites form.
 */
function sites_site_delete_form($form, $form_state, $site_id) {
  $site = _sites_get_site($site_id);
  if (!$site) {
    drupal_goto('admin/structure/sites');
    return;
  }

  $form = array();
  $form['site_id'] = array(
    '#type' => 'value',
    '#value' => $site_id,
  );

  $form = confirm_form($form, t('Do you want to delete site: @sitename ?', array('@sitename' => $site->title)), 'admin/structure/sites');

  return $form;
}

/**
 * Delete sites form submit handler.
 */
function sites_site_delete_form_submit($form, &$form_state) {
  $site_id = $form_state['values']['site_id'];

  _sites_delete_site($site_id);
  $form_state['redirect'] = 'admin/structure/sites';
}
