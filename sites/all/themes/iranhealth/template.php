<?php

function iranhealth_theme() {
  $items = array();
  // create custom user-login.tpl.php
  $items['user_login'] = array(
  'render element' => 'form',
  'path' => drupal_get_path('theme', 'iranhealth') . '/template',
  'template' => 'user-login',
  'preprocess functions' => array(
  'nrghost_preprocess_user_login'
  ),
 );
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'iranhealth') . '/template',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'nrghost_preprocess_user_register_form'
    ),
  );
  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'iranhealth') . '/template',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'nrghost_preprocess_user_pass'
    ),
  );

return $items;
}



?>