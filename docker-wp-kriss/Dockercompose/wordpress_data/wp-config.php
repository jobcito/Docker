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

define( 'AUTH_KEY',         'b:C9jmG.,Q:f;CDzqB*&sQMdn_B4RT9xC3v91WO/zfb>)9V2{iwAj4 UD.&^`zv,' );

define( 'SECURE_AUTH_KEY',  '77k)BDtyNYiYtXYDrq!C;?uYnf]?3tQ=`iBXS>gFz=bm!W]xNxwNmNH3Q!NKC;x|' );

define( 'LOGGED_IN_KEY',    ':K3jKZtUPr[Qdr1`Vz|g`<Dz1Ax~;q/YEZ9_k)b(x^!-s}b6L@c:E3jf]l{Xrz3^' );

define( 'NONCE_KEY',        '8gS9KP{1;G]V;Gq3~,1d>!@Z}tJu/Y:*VpzAr$[d;_]`mu=srlWaJ,RIV.P>m^Y^' );

define( 'AUTH_SALT',        'YNYNo:X@;B(Og(v7(#LsUf.PUX-z79]V|Th%~@kQ*2aa4}~ky^S({[8RSv11#FL.' );

define( 'SECURE_AUTH_SALT', 'Ua#iKD)R{x@Icd>LG r)ZFabzn]%v@NmlRJtmb!]) SgKp7pu1G#dL7h)SAR1A]/' );

define( 'LOGGED_IN_SALT',   'u46 zx=>HM]T0nGPN{={xLrYB;8:!JjPG.fb7?dBd7NuWuE}Dx:eYOJ%ue~)]6mf' );

define( 'NONCE_SALT',       '75gt nDT)g6N0U:;7eZ%jP#`Wy}*588&5)=?[J6~ZeAc*JEIP<~;%<bB[K^u,n8' );


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
