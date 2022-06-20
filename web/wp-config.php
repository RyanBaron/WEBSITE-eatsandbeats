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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',         '>?<T=.tsk|VyJ 8Vv%9-d,.|kP}Tz)18/+S^O:u^;]NtSB<POa4X#nF,iFzOre|.' );
define( 'SECURE_AUTH_KEY',  '/oRbVr5VFsVD5=)0)`>2OH6YKd@kQveiy&,[Oh4tIv]#-Kl|@bffqUzRB`2A[%,o' );
define( 'LOGGED_IN_KEY',    '2U[fpG,NF%D,hg)y*t Emw0,AK`jZRVbn~#|[Z}9X0*VOW*G&Mf^wCcxsj^s>=;p' );
define( 'NONCE_KEY',        '}PuiJRWj]:T9K@v9[<N!kgwQ]k@w>QK(ToUBp%Fyq=fwXW<2|pdn%.ya7I9WF1Ct' );
define( 'AUTH_SALT',        'p^B=c[bRW-O<xH}eU-m{3`<>@1zQ&BT[oJM%cP|&<SgnFs4;ouL;yUMG*Q3*+6ih' );
define( 'SECURE_AUTH_SALT', 'ideEkWJoX*$B,(T?,QH-Hq`=2wkqocz7}TdnEppxVGYC91Wb^C.rFHGajvwDdVVo' );
define( 'LOGGED_IN_SALT',   'P-(/YgVHzA%]faeW`dm@F_;JRo?q/?G2!P:~|.-fweivr|(K)2ye0Gq}uulLa{rZ' );
define( 'NONCE_SALT',       '(}/qW0X0:>YEM-MQG,e@bV}qLD*Egn<q@5AQIFv9jXf~qvQO`d<Wj}2$nmw}}QX?' );

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
