<?php

/**
 * @file
 * Views module filter plugin handler.
 */

/**
 * @todo Document this class.
 */
class sites_handler_filter_site_current extends views_handler_filter {

  function query() {
    $sid = context_get('sites', 'sid');
    if ($sid) {
      if ($this->relationship) {
        $base_table = $this->view->query->relationships[$this->relationship]['table'];
      }
      else {
        $base_table = $this->view->base_table;
      }

      if ($base_table == 'node') {
        $table = $this->view->query->ensure_table('site_node', $this->relationship);

        $field = $table . '.sid';
        if (isset($this->options['display_all_nodes']) && $this->options['display_all_nodes']) {
          $or = db_or()
          ->condition($field, $sid, '=')
          ->condition($field, NULL, 'IS NULL');
          $this->view->query->add_where(0, $or);
        }
        else {
          $this->view->query->add_where(0, $field, $sid);
        }
      }
    }
    elseif ($this->options['operator'] === 'all') {
      // Set a failure condition and let the display manager handle it.
      $this->view->build_info['fail'] = TRUE;
    }
  }

  function admin_summary() {
    return t('Current site');
  }

  function option_definition() {
    $options = parent::option_definition();
    $options['display_all_nodes'] = array('default' => 0);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $form['display_all_nodes'] = array(
      '#type' => 'radios',
      '#title' => t('Display nodes without attached sites'),
      '#default_value' => isset($this->options['display_all_nodes']) ? $this->options['display_all_nodes'] : 0,
      '#options' => array(
        1 => t('Yes'),
        0 => t('No'),
      ),
    );
  }
}
