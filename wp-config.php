<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'valent2x_wp4' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'valent2x_wp4' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'e7XC^%90U' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eLL`Luu4~pj`l?Xs6y>>yG4y6HN,Q-OSqD &C) FjG{wp1 N):0l]qxcM pe,^ec' );
define( 'SECURE_AUTH_KEY',  'S]6|gFTw=F[;UXg*GlV ex0c&{qNCT3>1kGSL=<&S;0xEq7i``A]$+Sj9 #%E,.L' );
define( 'LOGGED_IN_KEY',    '3FB5cnN^el+Pr,NQF5.2C}+l1mO^_3]_ 7L*ck2WAcdQmB}o0B,,[H==x+_5l]p9' );
define( 'NONCE_KEY',        'l99eSWr~E,hyI*Ah+v/eabLhi9*z0W,I/CFySd`!$4S{~Ufm#_MnjKq1>o[2e/3n' );
define( 'AUTH_SALT',        '@CMUP/(jL(UE#{O.|vn9cTz#CzoD%qQ&V,<dM&*6,@Qq~Lo9}/|hbWh%xt;7#L$C' );
define( 'SECURE_AUTH_SALT', '  YDz+{5Mv[G?r^Qdir 4|d~:PPi LMryLW%8:T 6L3KZ@Rk0=LXm<Q?L4e_Xl,~' );
define( 'LOGGED_IN_SALT',   'rN!}iA>u[H!XYF[[RVy1q!&.<_%TtlN1`z_`6hO@c%JwMmPz:E7gu{[[H.g6%uGP' );
define( 'NONCE_SALT',       '|5 !>bJ&AsVa=ZMP|(%-(#93b*Ue45hyMc]FC[zpL3-&:[u?edMv}El4/A?.$m2y' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
