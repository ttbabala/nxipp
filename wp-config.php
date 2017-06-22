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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'D:\wamp\www\nxipp\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'nxipp');
define('CONCATENATE_SCRIPTS', false );
/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'deze');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'CSk,PZb^0-LZU3y{EwSvd].!B^J8kxVM,j(VI&|XGcZ}plO-i/?)kT->V= *~8XQ');
define('SECURE_AUTH_KEY',  'jK4 2%f(LoHnmd,gmq>CJAlYVJ_ut^ugUBl]3#Q4Bj+Ra4 &OV9/y{of1=c-.^Ug');
define('LOGGED_IN_KEY',    '_xD8KaP#Z4v82<j_44TSyQ6pFO!isvyKhjmHP__CJO+wRCCt*u&aKVKK$r<CG57_');
define('NONCE_KEY',        '6*b#6[tJVw|[gKn ]cWZ~SQV>4mLQDbxJbkb;c(U0G4K}DWW+,kr|SVkG8gR#,s$');
define('AUTH_SALT',        '6H5)Qp[o+J:lz95i0)D<E(+3?PdEOrQhvZ|1T7of+.~Ts$Ifr%1ZV3GF&JT,5%*I');
define('SECURE_AUTH_SALT', 'KNkLgfNp ;>sa`=:FWF]A!}p4.[L0N9hP3a8(l-]i?RE:`?$t7U?NmG?MOk7uQ0l');
define('LOGGED_IN_SALT',   'f@vYDeV^Wg<3!w<?dAz[mK^HZZDlsbs26@,hMnl|.?sX}1j?+5kiO.]HYEkkq!yl');
define('NONCE_SALT',       '7Mtpbdnn.g46Y?>n&M=fZgKp`Q7!@#99l;&cF(~9di>ON+xj8:0ug^{Xn8|=[`K%');

/**#@-*/
define('WPLANG', 'zh_CN');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'zs_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');define('WP_TEMP_DIR', ABSPATH . 'wp-content/tmp');
