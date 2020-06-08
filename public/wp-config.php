<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// You'll need a DATABASE_URL env variable set.
$database_url = parse_url(getenv('DATABASE_URL'));

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', substr($database_url['path'], 1));

/** MySQL database username */
define('DB_USER', $database_url['user']);

/** MySQL database password */
define('DB_PASSWORD', $database_url['pass']);

/** MySQL hostname */
define('DB_HOST', $database_url['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', getenv('WP_AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('WP_SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('WP_LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('WP_NONCE_KEY'));
define('AUTH_SALT', getenv('WP_AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('WP_SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('WP_LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('WP_NONCE_SALT'));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', (bool) getenv('WP_DEBUG'));

/**
 * Disable the plugin and theme editors to improve security and reliability.
 *
 * @link See https://wordpress.org/support/article/editing-wp-config-php/#disable-the-plugin-and-theme-editor
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Prevent file modifications since our environment is ephemeral.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_is_file_mod_allowed/
 */
define('DISALLOW_FILE_MODS', true);

/**
 * Disable automatic updates.
 *
 * @link https://developer.wordpress.org/reference/hooks/automatic_updater_disabled/
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact.
 *
 * @link http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
 */
if (
  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
  $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
) {
  $_SERVER['HTTPS'] = 'on';
}

// Figure out protocol.
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

/**
 * Update wp-content path.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content_folder
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define(
  'WP_CONTENT_URL',
  $protocol . '://' . $_SERVER['HTTP_HOST'] . '/wp-content'
);

/**
 * Accept whatever incoming hostname as our site domain.
 *
 * @link https://wordpress.org/support/article/changing-the-site-url/#changing-the-site-url
 */
define('WP_HOME', $protocol . '://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $protocol . '://' . $_SERVER['HTTP_HOST']);

/**
 * Configure S3 Uploads plugin.
 * 
 * @link https://github.com/humanmade/S3-Uploads
 */
define('S3_UPLOADS_BUCKET', getenv('S3_BUCKET'));
define('S3_UPLOADS_REGION', getenv('S3_REGION'));
define('S3_UPLOADS_KEY', getenv('S3_KEY'));
define('S3_UPLOADS_SECRET', getenv('S3_SECRET'));

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/**
 * Composer's autoloader.
 * 
 * @link https://getcomposer.org/doc/01-basic-usage.md#autoloading
 */
require_once __DIR__ . '/../vendor/autoload.php';

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
