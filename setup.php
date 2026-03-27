<?php

use Glpi\Plugin\Hooks;

define('PLUGIN_BRANDING_VERSION', '1.1.0');
define('PLUGIN_BRANDING_MIN_GLPI', '10.0.0');
define('PLUGIN_BRANDING_MAX_GLPI', '11.99.99');

function plugin_init_branding() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['branding'] = true;

    // Cache-busting: read version stamp
    $ver_file = Plugin::getPhpDir('branding') . '/public/version.txt';
    $v = file_exists($ver_file) ? trim(file_get_contents($ver_file)) : PLUGIN_BRANDING_VERSION;

    // CSS for authenticated pages
    $PLUGIN_HOOKS[Hooks::ADD_CSS]['branding'] = [
        'css/branding.css?v=' . $v,
    ];

    // CSS for login/anonymous pages
    $PLUGIN_HOOKS[Hooks::ADD_CSS_ANONYMOUS_PAGE]['branding'] = [
        'css/branding_login.css?v=' . $v,
    ];

    // Minimal JS only for favicon (CSS handles everything else)
    $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['branding'] = [
        'js/branding.js?v=' . $v,
    ];
    $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT_ANONYMOUS_PAGE]['branding'] = [
        'js/branding_login.js?v=' . $v,
    ];

    // Config page
    $PLUGIN_HOOKS[Hooks::CONFIG_PAGE]['branding'] = 'front/config.php';

    Plugin::registerClass('PluginBrandingConfig');
}

function plugin_version_branding() {
    return [
        'name'           => 'Branding',
        'version'        => PLUGIN_BRANDING_VERSION,
        'author'         => 'Custom',
        'license'        => 'GPLv3',
        'homepage'       => '',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_BRANDING_MIN_GLPI,
                'max' => PLUGIN_BRANDING_MAX_GLPI,
            ],
        ],
    ];
}

function plugin_branding_check_prerequisites() {
    return true;
}

function plugin_branding_check_config($verbose = false) {
    return true;
}
