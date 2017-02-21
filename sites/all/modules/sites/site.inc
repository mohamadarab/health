<?php

/**
 * @file
 * site class.
 */

/**
 * Essentially this is a PURL record with some extra data attached.
 */
class site {
  var $sid;
  var $purl_prefix;
  var $title;
  var $name;
  var $front_page;
  var $menu_main_menu;
  var $menu_secondary_menu;

  function __construct($title = '', $purl_prefix = '', $name = '', $front_page = '', $mpl = '', $msl = '', $sid = NULL) {
    $this->title = $title;
    $this->purl_prefix = $purl_prefix;
    $this->name = $name;
    $this->front_page = $front_page;
    $this->menu_main_menu = $mpl;
    $this->menu_secondary_menu = $msl;
    $this->sid = $sid;
  }

  function save() {
    if ($this->sid == NULL) {
      if (count(_sites_get_sites()) == 0) {
        $this->sid = 1;
      }
      else {
        $this->sid = max(array_keys(_sites_get_sites())) + 1;
      }
      drupal_write_record('sites', $this);
    }
    else {
      drupal_write_record('sites', $this, 'sid');
    }

    $modifier = array(
      'provider' => 'sites',
      'id' => $this->sid,
      'value' => $this->purl_prefix,
    );

    purl_save($modifier);
  }
}
