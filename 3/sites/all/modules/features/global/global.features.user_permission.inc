<?php
/**
 * @file
 * global.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function global_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'create inscricao content'.
  $permissions['create inscricao content'] = array(
    'name' => 'create inscricao content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete any inscricao content'.
  $permissions['delete any inscricao content'] = array(
    'name' => 'delete any inscricao content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete own inscricao content'.
  $permissions['delete own inscricao content'] = array(
    'name' => 'delete own inscricao content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit any inscricao content'.
  $permissions['edit any inscricao content'] = array(
    'name' => 'edit any inscricao content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit own inscricao content'.
  $permissions['edit own inscricao content'] = array(
    'name' => 'edit own inscricao content',
    'roles' => array(),
    'module' => 'node',
  );

  return $permissions;
}
