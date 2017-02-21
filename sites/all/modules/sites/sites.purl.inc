<?php

/**
 * @file
 * Persistent URL module integration for Sites module.
 */

/**
 * Implements hook_purl_provider().
 */
function sites_purl_provider() {
  $items = array();
  $items['sites'] = array(
    'name' => 'Sites module',
    'description' => t('Sets a context based on PURL modifier.'),
    'callback' => 'sites_set_current_site',
    'callback arguments' => NULL,
    'example' => 'somesite',
  );
  return $items;
}
