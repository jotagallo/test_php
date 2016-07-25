<?php
/**
 * @file
 * global.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function global_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'global';
  $context->description = 'Contexto global';
  $context->tag = 'global';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '~admin' => '~admin',
        '~admin/*' => '~admin/*',
      ),
    ),
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'inscricoes-botao-inscricao' => array(
          'module' => 'inscricoes',
          'delta' => 'botao-inscricao',
          'region' => 'sidebar_first',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Contexto global');
  t('global');
  $export['global'] = $context;

  return $export;
}
