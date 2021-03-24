
<?php

/**

 * The base configurations of the WordPress.

 *

 * This file has the following configurations: MySQL settings, Table Prefix,

 * Secret Keys, and ABSPATH. You can find more information by visiting

 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}

 * Codex page. You can get the MySQL settings from your web host.

 *

 * This file is used by the wp-config.php creation script during the

 * installation. You don't have to use the web site, you can just copy this file

 * to "wp-config.php" and fill in the values.

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define('DB_NAME', 'db_redmeatprod');



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

define('AUTH_KEY',         'LQ^P=Ogpldvflb*!L<+2jD(nKv$)@qXaPR5C_p( +.@YO1V$i3u;RH7R)!d,y8I8');

define('SECURE_AUTH_KEY',  'vw?~{/Cop?I:)+i6-7)~,i~HaKUYhU56 y7RW~YTBj4TTW7q,Ku/Er%)e{+H--j!');

define('LOGGED_IN_KEY',    '^Eg-Kl:T$Q }:W5CItCGMW:~(qv5}P-H[(o5N&$MwEyxyX{6GuH7eVkLd.Y|KXG;');

define('NONCE_KEY',        '.{D4PQSvqQ&%p`*~LfN7!Xn/]Mk;$:&R+TNpo1$N6;Un;&oYM[YXm0ynr8_5A_${');

define('AUTH_SALT',        '@znVlt4rN+Q)-2C=<Ua>H?+`VKjs=VOK5)GT`6Zf!kn4o=k*0LAt^Pg=:x;G)WM/');

define('SECURE_AUTH_SALT', 'HoMz`+wP|m($)LH}+JGY[@?J_(Na>7O/5d9bC1b,ke.dfHsHq.EH.P4-|ew =wzT');

define('LOGGED_IN_SALT',   '7tc+Wad=>?sT?V_!F.qC/f-om.*A0T#hf!9+-NY|<t0dQa>)wrm*>r-{0ROO kET');

define('NONCE_SALT',       ',B<VTcH|jw?p1X:u/h<Y1h6Q|nXJEH4Y~F<4*LV?!L0yIS,Wq:$#tL[9C*-$E=E_');

/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';



/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 */

define('WP_DEBUG', false);



define( 'DISALLOW_FILE_EDIT', true );



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');
