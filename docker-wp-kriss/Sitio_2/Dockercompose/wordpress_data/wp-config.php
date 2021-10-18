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

define( 'DB_NAME', 'bitnami_wordpress' );


/** MySQL database username */

define( 'DB_USER', 'bn_wordpress' );


/** MySQL database password */

define( 'DB_PASSWORD', '' );


/** MySQL hostname */

define( 'DB_HOST', 'mariadb:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'A.OiVu)v33A_T]B6!O&3Uy1YdQIR]-za[[?Q5G@(YL>ef3#(orD*dHA$D@gTkJZ2' );

define( 'SECURE_AUTH_KEY',  'W`CAv#kP-U,Dv~eqOQ&+ss.A1HMO|0<i2Z<D+V.]Yf)hV~m>fbFT%/r8Q!a:*ry:' );

define( 'LOGGED_IN_KEY',    'pB~QwexL-:0d@/1;3w@`5=>QK/m1h3V>e/a-^V:H5b[&Q.}gC/xuHu=~`irGg.qh' );

define( 'NONCE_KEY',        '~YBn8{A/Q&!vc(B[}`3,*+28e3Z+NZHzJxd)[ia->l~@X22J&uL=ASS`sNV9Cz_:' );

define( 'AUTH_SALT',        'RqW6 I]!%zq=HV56)-M#$XMMd U0U$@wa-cz~BW7*4Ou.[z];+_GSiuR%)t;_v7-' );

define( 'SECURE_AUTH_SALT', 'Dt*p>NY;}f@RzRY?v/v*t5E.Z8(3^wgt{s&F4Jj&rA6 LDP$1?(yZKNkR|,ZHl.y' );

define( 'LOGGED_IN_SALT',   '^w:}~eT5Zt{xFtqO-o7VqDlX2XPhbYIHqU@KHS82j.Gk4Subs^d.z[m+B}UqQ_ZS' );

define( 'NONCE_SALT',       'Fudo$PAX?$Rf8b,`xgSA#-/1?4)&w5Jy)x<[d/>b{(&M$K72ni{l#f}I[>HJA!Q,' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
