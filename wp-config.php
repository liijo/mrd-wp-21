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
define( 'DB_NAME', 'mrd-21-wp-n' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'BKRVHj7?b=$KQb%*v)sqU~ZXyy*uU)I[LJ^]N*pI>2DYd!ClAm/i?Yw&&;W5w2<~' );
define( 'SECURE_AUTH_KEY',  'yj7BR(D_[%CRlO5YraXleo/pHolhFci6Zy5OjCbC_1|9}Yr$qhLD96^ !a||6)u}' );
define( 'LOGGED_IN_KEY',    '])tc/XvY#,|.:cc&O&,A]P`HPm }TUpVH~Y?SeRv|H>q~91C:bAa9DsE 5BRhb,.' );
define( 'NONCE_KEY',        'f@w0,m(.b)0d/PGTou;sX?RDObuup;00++i|0a4;c%{<qO[5A-Uy.FZ)ZfuSv|0M' );
define( 'AUTH_SALT',        '*dO9scq?9_k@A=2VaRft3Y+jL?YH%mGt9@9);&F2FS@Jh~&Z2IbQ]k2ag 0:<cJ$' );
define( 'SECURE_AUTH_SALT', 'WdTn#()SRe7~EW(%W7{(>44b}ujfiZTD9fHwsk#)pHh52}hi%g[XN*CtFU=wM,#!' );
define( 'LOGGED_IN_SALT',   'M^ryZ*5LaFqha{BQ:1TL39D{+dPc>bCN=}@Ip Y#X0R<iuX4k_w<_y@1RI|<hBB*' );
define( 'NONCE_SALT',       'e=Wb/[#/P3|dB_xOYy8OPOvBoe_Gsa;Q(6pBU-eA-fRng)tN7Ig,jk;p>Z : hEP' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wmrdigitalp_';

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
