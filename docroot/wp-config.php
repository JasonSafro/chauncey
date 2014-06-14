<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dev_chauncey');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '6quH_FO5t-&[V |S@GICNfi5km6K+` s+#hmf KvXdNxkkIXE%p(t.voE3`_9`QE');
define('SECURE_AUTH_KEY',  'Z.-W,fR(.?DqFkHc=:@]HDq%E{q6$8wP|xFb4s^UuUamR*9)_ZT8dF@ZZ Uwk+*6');
define('LOGGED_IN_KEY',    'oroTrJB7Fub0LW5!wQ!IM=at-zpX+4Z<0L5 WtTGgM 3Fj2+f~[O1FO>vst|}_*q');
define('NONCE_KEY',        '_`#SgQ{YVoBlZ,,p>_fI;{hK5$(_{w]2)jT(sdlnM}i(zg4EDrNmc|4zJ44.-P`g');
define('AUTH_SALT',        '|2+)pZqvcT3Y-<0#mS#|D{O2`mtI`Z.kAu0W;Ou1X@jrdcyfAAJl%KBg+%YR=186');
define('SECURE_AUTH_SALT', '()mqxgB+G=gIsS<&&=T,s9wRO~U`Vb(qfm|m]B1s_~xdRzo<#Ap*u51-d,)^Q#sy');
define('LOGGED_IN_SALT',   'EC=Fl:aSyvzB+a#fkR#I2Jc%k7Q7yx8Ob6Oyp!b<w^@a{&}]ERS0A|+@+b.K)A3a');
define('NONCE_SALT',       'bZGv*%(RxbI0mHTPqfF+6VU>7=|03Nk#(+^@SWm`[p<E~*k2l5-Mf`*R^{~Z+}An');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
