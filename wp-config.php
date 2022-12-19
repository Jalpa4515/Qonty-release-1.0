<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vncrekttab' );

/** Database username */
define( 'DB_USER', 'vncrekttab' );

/** Database password */
define( 'DB_PASSWORD', 'SsG9wNKkqp' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7glukdjxrdm0kp21g0xj1tdl5y1oiuvanemszu5z6tapeb3uxp8ksbhyldsgb4iw' );
define( 'SECURE_AUTH_KEY',  'br4agvuostbl9m5lrzx5vyngnh7rktzgfvuwwk8qkmlbmelfu7np4ep4vl28px5u' );
define( 'LOGGED_IN_KEY',    '7zetc5zadcgpmew7azxez0j8gjzm4bi1rt6esuhdazxgipx1j5ygrpbtuv0jhj7y' );
define( 'NONCE_KEY',        'i0u0wovl9jsitrpk3mac3tvzkxbqu4cjsbobtasoyiybtcnntszan9mfbbrr395v' );
define( 'AUTH_SALT',        'xgmivmej3wdaunpiqvu0pbkqlq6wog4svwleou8v1rzx8yjk6o6e7dntitaubrl3' );
define( 'SECURE_AUTH_SALT', 'mtilqy5dkkga2tfbjl0lgbdlkbyfvmmql8yer65b63k0bbehakuebtmojqodvuk8' );
define( 'LOGGED_IN_SALT',   '9qwbdker8wblhgkvgwynxfpodcgmjij1x6zdnwg0zql1juoeo793i0iaspd6g38w' );
define( 'NONCE_SALT',       'yjy3kdlovhxb13blwwc5btlsug7lt71seghyq25nshkl8nj6zmhvvywh3smfyhyl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpjc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('ALLOW_UNFILTERED_UPLOADS', true);
define( 'WP_MEMORY_LIMIT', '512M' );


