<?php
/**
 * @file
 * global.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function global_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "context" && $api == "context") {
    return array("version" => "3");
  }
}

/**
 * Implements hook_node_info().
 */
function global_node_info() {
  $items = array(
    'inscricao' => array(
      'name' => t('inscricao'),
      'base' => 'node_content',
      'description' => t('Inscrição'),
      'has_title' => '1',
      'title_label' => t('Nome'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
