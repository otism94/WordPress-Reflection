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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-reflection' );

/** MySQL database username */
define( 'DB_USER', 'wordpress-admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'HqQ1lg592.kpv51D' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0NZ4})LnaxJg<RzInw1#V9x<Hl4~v8^S$AqlqE<u<cEBqMBt|I&f(|YS*pQ@S1~C' );
define( 'SECURE_AUTH_KEY',  '+,8OI l2{iP<{/Nks_O; 3Br]>rPg8JX?u9dD <yr!sq_98;av]NE(bZg%MV`MNb' );
define( 'LOGGED_IN_KEY',    '?i%+2VdkAt,Jg~$mKl9fd/ubBL6|gLw~uQ+r7uWpKigCiOB*2a,cts~7-jbOgqX*' );
define( 'NONCE_KEY',        'V6%W}2v]ZG:=^1?0a}{a,WwXY*wt,!K4z/P+/zSAD)R=cM~bouMwR-DnEX,4]F=1' );
define( 'AUTH_SALT',        't5>,Z3jE.MW>9Bcd#Z]a2#!t!7^4-!-B,oy<WVZ%}*1LW$?KDaH tX1CO2)?#$[1' );
define( 'SECURE_AUTH_SALT', 'JB>/+]9%nfnu}0*,Mb%*RmfzH9067G778+A)P<e3QCki`qaFKMyVdg@iLI@71hC~' );
define( 'LOGGED_IN_SALT',   'nZABgJghHhzAu|q|r?(9yD@&nFaz*V ?9>Ml+nOS:jd(*}!^9B7%sf$Z2;.>qOQ#' );
define( 'NONCE_SALT',       'e$fw6KF@YX0/&2Ju>T.XE_(?o?}kU{>IP+ZC2vT.I0BkO~VEK>09x^z@04_9DqOm' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
