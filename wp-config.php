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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hanna' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'iDpq2VY_A1 pYW7F(FQ%wj}rt*(bvP+eYWlia[WC9j>qFCuctTW{F*$R&u}9o>1a' );
define( 'SECURE_AUTH_KEY',  'Tw&0rk8fsQ-%m$rODDGbEY,mdj_rmT++L~-g0$$Ki+mb{9W&izQirD3vS(RwC3-~' );
define( 'LOGGED_IN_KEY',    '!W/7ukAEdy4sv|})9i1DYtCa4~wEge[HC10tg=+,*v Z(8Y=.9d>Vvc~Dh=#,9P6' );
define( 'NONCE_KEY',        'WiT-K-b3Wp=Y~mnYqR?Pm|5XOLg^xi[VSenhbsZKwe<sdc?seSE|d8l>+p?rBtn#' );
define( 'AUTH_SALT',        'U|U}s1:`=:.(ML}Q+3Cvlp= H@}-&vjC&R+,v47Ef07gw}^pMX8NCLO:]EpRCIDS' );
define( 'SECURE_AUTH_SALT', 'ktG2!H;o]Y#thN7H7(ySYiMu=Z<V{k[#?}}QI9}k_+,c)<J]3FVJ?.MaQ]*/@Bg2' );
define( 'LOGGED_IN_SALT',   '9Xb->Z!s $F$`JpSr^Uyb5cxIiBYvD2chm[M oc7r)-bcR5@C5iF%hKm<3a>Z]3>' );
define( 'NONCE_SALT',       'L;))#f[XQ{,~8$|+,N=G(j#4&1OLgxVmaXS$%x_os| 8a9(Roo]]w#?z=YtL^jNv' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
