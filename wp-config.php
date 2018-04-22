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
define('DB_NAME', 'wordpress_js');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'dwwWEe2Jy#QfyoU:,i)gsgo}E.yysQT5$*N8b&s_4x{Y8CvksYShbM}cqY*x&~l)');
define('SECURE_AUTH_KEY',  '}{ `EeiY5+q)cE`)7]k?^z>et|F}&stpm^d%HNxWMYI{}yl7|1-&^{Vqhvc~S^12');
define('LOGGED_IN_KEY',    'R]Ds.sj5|o|`[YI]}3p}s|4JlD(9;do()Vw{s6bsn,QJ1tpU?CBZ;Ef&4E*EhPQ6');
define('NONCE_KEY',        '*)PF puE@2F>tdfHx>hKI1,_}Y@?]J$b*/c-#5(-srDezw?[iuo-wZ,0;BWji$Uk');
define('AUTH_SALT',        '}0s9w#!hgnb00>Ixs0/i@HISHK$Me%GY08ww&$=L7j$gQA!riDP-]+X{C|ZNr0qI');
define('SECURE_AUTH_SALT', 'f#yo/nw-C>w]t7mCt,y$^M0r8:#;x(BLsoKr@2`|8z;$Tu,W=JGaY8~S-R)tdg5B');
define('LOGGED_IN_SALT',   'uvR7-3DSv3}NH3vYABz[sSOO&`DW=jQOe^3-r~Ui|IRy}&Fw/IhYd4@P=_H3`VIr');
define('NONCE_SALT',       'Z<$DWxdi:vPV>&~?==w4;fX#@Mw]rD4csb8+{b;N_Y,&tYCP >LP~vEtip3Nw/PQ');

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
