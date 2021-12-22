<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'questzone');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Tj1;zym4mj,^m^oj4xP1uY3QvSyuky;b+Ork_Dx/RiE-f,$/]A=!3Qn~l:xG%R?L');
define('SECURE_AUTH_KEY',  'ea,_}9P!>ewSQt+!cePsV>Z)t2[_K97D&I/ZU9Ria1~C0=8m`kL|uWEzX]F#>_W{');
define('LOGGED_IN_KEY',    'hG$|FW#xz/j9H;lk{Xmc6Xgo<My?xF/kKZX%F.Zo<%tG7iG_n/2>>e87`|1?Mj/Z');
define('NONCE_KEY',        '9Gpqc?-j[n`RU/Q5VcQW}If}P*{s !-]$1X;[)z!^KG)0L$3NA^f-#yz2b6iP#IW');
define('AUTH_SALT',        'IV$I}Qu{iIUau#VXXaZiBSLNB3#U}md-9yBbmK#&QIJrz&YYe)QLB_CZg_LmitVf');
define('SECURE_AUTH_SALT', ':P(g?i?U(P^T2A46=7MVask`ex<`isrY+f,qws/wjW=38$-bckhox2,]i+j.-r:_');
define('LOGGED_IN_SALT',   'Iq3]AZ@$dT<(oW<XAnfvt%x+#&f~1|;%SZ2q_+}#N8a .|9zko!*QEqa{^BGxon&');
define('NONCE_SALT',       'SJmT:,pj?*o4gPZdkyG(-:p)2o?<$6OnGph>kzl0Sy#[dRH&I/HEX4cgrNN~@!v*');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
