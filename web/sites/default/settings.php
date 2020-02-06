<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Place the config directory outside of the Drupal root.
 */
$config_sync_directory = \Drupal\Core\Site\Settings::get('config_sync_directory');
$config_directories = array(
  $config_sync_directory => dirname(DRUPAL_ROOT) . '/config',
);
$settings['config_sync_directory'] = $config_directories[$config_sync_directory];

// Pantheon Env Specific Config
if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  switch ($_ENV['PANTHEON_ENVIRONMENT']) {
    case 'dev':
      $config['environment_indicator.indicator']['name'] = 'Dev';
      $config['environment_indicator.indicator']['bg_color'] = '#2e7d32';
      $config['environment_indicator.indicator']['fg_color'] = '#ffffff';
      break;
    case 'test':
      $config['environment_indicator.indicator']['name'] = 'Test';
      $config['environment_indicator.indicator']['bg_color'] = '#d84315';
      $config['environment_indicator.indicator']['fg_color'] = '#ffffff';
      break;
    case 'live':
      $config['environment_indicator.indicator']['name'] = 'Live!';
      $config['environment_indicator.indicator']['bg_color'] = '#b71c1c';
      $config['environment_indicator.indicator']['fg_color'] = '#ffffff';
      break;
    default:
      // Multidev catchall
      $config['environment_indicator.indicator']['name'] = 'Multidev';
      $config['environment_indicator.indicator']['bg_color'] = '#efd01b';
      $config['environment_indicator.indicator']['fg_color'] = '#000000';
      break;
  }
}


/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

/**
 * Always install the 'standard' profile to stop the installer from
 * modifying settings.php.
 */
$settings['install_profile'] = 'standard';
