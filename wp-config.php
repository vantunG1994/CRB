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
define('DB_NAME', 'tungtest01_mangvieclam');

/** MySQL database username */
define('DB_USER', 'tungtest01_mangvieclam');

/** MySQL database password */
define('DB_PASSWORD', '0986598756');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ',ep`umloAXt1Er*Fw~&C=,sl(yQm[-p<X~E#c2<!F)BrZ|#+q=E{m%#Wa0*RxM]D');
define('SECURE_AUTH_KEY',  '0VD-_k+W/EZ0m)drEV[ rER^>1$5`c|V8URGG}BS]k+4oZyH%1-D3akSIIqYyX.G');
define('LOGGED_IN_KEY',    '_)f~obTp3Ud} V0OK9JN$zwrT]Tl07w:L#/N}W[mx/#`g^&!zXgL<nEP-L/lue$i');
define('NONCE_KEY',        '>i!:{SaIX]YW#f#|}sU{dtAwm<]_Wb+9c5<^6aEMTN0l`oQ9M!|7vxP$MVE5qm<M');
define('AUTH_SALT',        '83B[D]3}95RCF#cX47LUiQ)[zqFHgm7NxyVW^:f`gOR|$rGL8CM8lFvhwI_p.t3z');
define('SECURE_AUTH_SALT', 'kQk{u^o;vf_J2R_r6{vc4M5:3]&i?%/?rk&xoXvtu4t V>2mir9uIKoSc*o)JruZ');
define('LOGGED_IN_SALT',   'qGeW[}QiehJWeD0L!ax~REaI)ddX0x?}OYRkjjjk3mg*F>Yg9HrpY]PlCr]gYHG%');
define('NONCE_SALT',       '[XF[6~8NH2e?Y}N}e>{xR2L;gRou_UwC83CN-GiAXC7q?Zr+?,7yuqhF<5^aZg+r');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
require_once(ABSPATH . 'wp-settings.php');
