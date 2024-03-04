<?php
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
define( 'DB_NAME', 'testeWp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'V7Qht#gDCI2x>u vM!uu}MEKE%NVN.,HkOvOcZFn@/?.X[``1Kr&,Jkqxs(}` jn' );
define( 'SECURE_AUTH_KEY',  'E!OdC=lrM:XF[HS39F$lHbxT&R% ?W3Y$D]bxMn^6,)ks4XqCGw/C ;<[BI3{/DC' );
define( 'LOGGED_IN_KEY',    'Z1X7}axDMSPX>UFUj7[`zHPYqxN2mN)O{$Sh-[P|x wRrtK[:Taxf&q$op]O] mB' );
define( 'NONCE_KEY',        '&gCgDs-Kkrr PRt*W~E0pjFkCZ{ePt(|ai}#V>~lj=i_SFfjZmN@MQsvL0PRD|R`' );
define( 'AUTH_SALT',        'VJVM[d9K794F3MT%1AvQ3=agjHgAET~;MN|{OljJQ<wIOS%hUS<N!{:9sS{Kswvh' );
define( 'SECURE_AUTH_SALT', '$$Y`Lk9g9%5CuKI-Z|3V3iz(Q_twtzy.R=tW*FL0m:[ h_qm<jfhu*cAB(bj7J2a' );
define( 'LOGGED_IN_SALT',   'z=&IsH~`{x<f-Nb=P1WcqX%~L9>]WOf;@Sv0]PO/I=m6S;UXr:S#8r5,2DP(7pYB' );
define( 'NONCE_SALT',       '-&O}^zZU!_|&nACy98J)!Xqf3.yA)enM25KrbY2si%D!#y<k{pA4!c!KxyH;E`c$' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
