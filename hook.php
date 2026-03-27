<?php

function plugin_branding_install() {
    global $DB;

    $table = 'glpi_plugin_branding_configs';

    if (!$DB->tableExists($table)) {
        $query = "CREATE TABLE `$table` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `entities_id` INT(11) NOT NULL DEFAULT '0',
            `is_recursive` TINYINT(1) NOT NULL DEFAULT '1',
            `logo_login` VARCHAR(255) DEFAULT NULL,
            `logo_sidebar` VARCHAR(255) DEFAULT NULL,
            `logo_sidebar_collapsed` VARCHAR(255) DEFAULT NULL,
            `favicon` VARCHAR(255) DEFAULT NULL,
            `login_background` VARCHAR(255) DEFAULT NULL,
            `primary_color` VARCHAR(20) DEFAULT NULL,
            `sidebar_color` VARCHAR(20) DEFAULT NULL,
            `custom_css` TEXT DEFAULT NULL,
            `login_custom_css` TEXT DEFAULT NULL,
            `login_text` TEXT DEFAULT NULL,
            `page_title` VARCHAR(255) DEFAULT NULL,
            `date_mod` TIMESTAMP NULL DEFAULT NULL,
            `date_creation` TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `entities_id` (`entities_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        $DB->doQuery($query);
    }

    // Upgrade paths for new columns
    $new_columns = [
        'sidebar_color' => "VARCHAR(20) DEFAULT NULL AFTER `primary_color`",
        'login_text'    => "TEXT DEFAULT NULL AFTER `login_custom_css`",
        'page_title'    => "VARCHAR(255) DEFAULT NULL AFTER `login_text`",
        'ui_style'      => "VARCHAR(30) DEFAULT NULL AFTER `page_title`",
    ];
    foreach ($new_columns as $col => $def) {
        if ($DB->tableExists($table) && !$DB->fieldExists($table, $col)) {
            $DB->doQuery("ALTER TABLE `$table` ADD `$col` $def");
        }
    }

    // Ensure public directories exist
    $plugin_dir = Plugin::getPhpDir('branding');
    $dirs = ['/public/css', '/public/js', '/public/uploads'];
    foreach ($dirs as $dir) {
        if (!is_dir($plugin_dir . $dir)) {
            mkdir($plugin_dir . $dir, 0755, true);
        }
    }

    return true;
}

function plugin_branding_uninstall() {
    global $DB;

    $table = 'glpi_plugin_branding_configs';
    if ($DB->tableExists($table)) {
        $DB->doQuery("DROP TABLE `$table`");
    }

    // Clean uploaded files
    $upload_dir = Plugin::getPhpDir('branding') . '/public/uploads/';
    if (is_dir($upload_dir)) {
        $files = glob($upload_dir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    return true;
}
