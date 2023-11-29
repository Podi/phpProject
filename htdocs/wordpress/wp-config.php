<?php
/**
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define( 'DB_NAME', 'oye5kg' );

/** MySQL felhasználónév */
define( 'DB_USER', 'root' );

/** MySQL jelszó. */
define( 'DB_PASSWORD', '' );

/** MySQL  kiszolgáló neve */
define( 'DB_HOST', 'localhost' );

/** Az adatbázis karakter kódolása */
define( 'DB_CHARSET', 'utf8mb4' );

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '+]ku=>!O^@]L+(@OS|c-QJ*;oS+}Z;;S294}^toTRMg[2,g/9*dKe=ZcclXl1h<g' );
define( 'SECURE_AUTH_KEY', 'GsABu,MP?-Zu>x4F(E+QJMFrUu+:uk;ETsx#h<7uY#S%63VA:a5{je~D<%9SJO7n' );
define( 'LOGGED_IN_KEY', '|Ha@h)=QBrrH+gemT@!|:U@j4-u]0l8qY]dv+^0~KT]MHTRsC^=6p*,R]nrr;P8e' );
define( 'NONCE_KEY', 'l8z4Q&r9&TAq<kaWiru!Nr|F,0z.Ikgo]=Pi@iGt]o@N^k2,U)]V 9?[H%?R|wU2' );
define( 'AUTH_SALT',        '{C)Trptr:o*87%h^qo:OHHugE&X1cU9J0v/osGVGWDP]}ISL74wL4+@7M9t>,>Oe' );
define( 'SECURE_AUTH_SALT', '}_y8Ywj}89p e|gTX@RguXqvQWfM,l1[YF >_Gen*T!:j|i9tBEqw_nnrqy?cXVp' );
define( 'LOGGED_IN_SALT',   'j~$FAp Ne3Ta~trI!psK_*3%3gTw^PT~vD@Zo#u-D$f@ mc K<?g~(jkqx>Cp<$H' );
define( 'NONCE_SALT',       '2syB2(c dPu_gGD@yjc =ry^wrDcK4 ?$7Y}]6eURqjd$6LeLild k<||C/?YkEt' );

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix = 'wp_';

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során.
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

/* Ennyi volt, kellemes blogolást! */
/* That's all, stop editing! Happy publishing. */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');
