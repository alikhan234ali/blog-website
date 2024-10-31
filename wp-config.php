<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blog-website' );

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
define( 'AUTH_KEY',         '};;bYF(qWs<]B[u[k&Nve&:5v3j%w`[@UQ5Dh4!F=@lnbHo#XL:=x?>J#8!E@74F' );
define( 'SECURE_AUTH_KEY',  'X{BRubw2&HXn46l:[5I<Qrff|P5*rztCX.*pU]2j6Ll;8c%feBv vA):b FnbwHo' );
define( 'LOGGED_IN_KEY',    's*D6X|HuRtT[4=dC&[rKd6kqI5>lo4nH{M1(uS/uL@G.cB6!6cJ-z{-|WzP`0nZ4' );
define( 'NONCE_KEY',        ']H|Md;wA}0Z_QbF2k$h(=jWOs%.KBDx%]Q-=M`+pS[.X{p i`{U01an>:b/*d{vS' );
define( 'AUTH_SALT',        '{&(|D> 3(Eks[.foa Y=W.NL*Wk49/ZP,#]Me$U|#YFw`vRw~Q9}49O&ifd@Gs0v' );
define( 'SECURE_AUTH_SALT', 'KWO9g;ymRe4OxHvLM)9=,rz!zj7WZr;Y1ym:gFef+aPkmc+K)yB*rv=gm+Mj$l5T' );
define( 'LOGGED_IN_SALT',   'QY)[fjYi]n#1avTcc?(2YkMdg+Z=7y68$E]U01*;(i1OUQr!Kr8k{h*(ac,G1FA)' );
define( 'NONCE_SALT',       '&&1`V=,ab2}r.s2b69kh;_;qFbWqHL@@luBOPVavktK4Fp*#2oNfK[6%2/R<[7Ry' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
