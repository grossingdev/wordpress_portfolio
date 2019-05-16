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
define( 'DB_NAME', 'portfolio' );
//define('WP_ALLOW_REPAIR', true);
/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'rootroot' );

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
define( 'AUTH_KEY',         '*o;v4D|.ZNm$;K?Im8H(_J)gC,@t4K9Ef9DkGGN1U9Y1nG/ngDCNK|ACtnoP]4n{' );
define( 'SECURE_AUTH_KEY',  'wmco1%dt(%40&Gt C)<R2L j,2G4rD#s,[=>c:!oK/Cs]pu(Z8/V7E.Ulp.045z&' );
define( 'LOGGED_IN_KEY',    'n5E}x03e3raL/=7zN2 !g)$Lqk(HkY)^+)Q@vgE~l7],%]7KQW7T{_p -jy4l]|5' );
define( 'NONCE_KEY',        'e<^.-I(,=arhgF{U0nLL=u`zv.(ZV2wOC`Qf&MLh7&%l!1UnoQWjM:;l!}_WSr.h' );
define( 'AUTH_SALT',        'nfOpo!C`BF^aqZP+d.S15)=Z,DBw]S^;q&+BG.;<-DDr3xjK&yZ-[j|;D1EC]C0c' );
define( 'SECURE_AUTH_SALT', 'h] PkgWsC9zPSyf[o%f(E9awa@V]AXT5O5Re}/_DOjZD.*:B{)EqaT?8y:Z:):sk' );
define( 'LOGGED_IN_SALT',   'QlVJS@&H6|A8]gw*U)PI?55L%.[),.j^?2}C9!zK!~qa85pd3AhaCibB 7zomx]F' );
define( 'NONCE_SALT',       '4D J<5/*pqqj1ukOBv,:PuRrE;%OB/0,2<9XqEf;]fSJYC~b0bRU/4scTe)l_)#9' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
