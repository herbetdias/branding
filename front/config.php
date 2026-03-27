<?php

include('../../../inc/includes.php');

Session::checkRight('config', READ);

// ── Export ───────────────────────────────────────────────────────
if (isset($_GET['action']) && $_GET['action'] === 'export') {
    Session::checkRight('config', READ);
    $entity_id = intval($_GET['entity_id'] ?? 0);

    $json = PluginBrandingConfig::exportConfig($entity_id);

    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="branding_config_entity_' . $entity_id . '.json"');
    header('Content-Length: ' . strlen($json));
    echo $json;
    exit;
}

// ── Import ───────────────────────────────────────────────────────
if (isset($_POST['import'])) {
    Session::checkRight('config', UPDATE);
    $entity_id = intval($_POST['entity_id'] ?? 0);

    if (isset($_FILES['import_file']) && $_FILES['import_file']['error'] === UPLOAD_ERR_OK) {
        $json_string = file_get_contents($_FILES['import_file']['tmp_name']);
        if (PluginBrandingConfig::importConfig($entity_id, $json_string)) {
            Session::addMessageAfterRedirect(__('Configuration imported successfully.', 'branding'), true, INFO);
        } else {
            Session::addMessageAfterRedirect(__('Failed to import configuration.', 'branding'), false, ERROR);
        }
    } else {
        Session::addMessageAfterRedirect(__('No file selected.', 'branding'), false, ERROR);
    }

    Html::redirect(Plugin::getWebDir('branding') . '/front/config.php?entity_id=' . $entity_id);
}

// ── Save ─────────────────────────────────────────────────────────
if (isset($_POST['save'])) {
    Session::checkRight('config', UPDATE);
    $entity_id = intval($_POST['entity_id'] ?? 0);

    $data = [
        'is_recursive'     => $_POST['is_recursive'] ?? 1,
        'primary_color'    => $_POST['primary_color'] ?? null,
        'sidebar_color'    => $_POST['sidebar_color'] ?? null,
        'custom_css'       => $_POST['custom_css'] ?? null,
        'login_custom_css' => $_POST['login_custom_css'] ?? null,
        'login_text'       => $_POST['login_text'] ?? null,
        'page_title'       => $_POST['page_title'] ?? null,
        'ui_style'         => $_POST['ui_style'] ?? null,
    ];

    $file_fields = ['logo_login', 'logo_sidebar', 'logo_sidebar_collapsed', 'favicon', 'login_background'];
    foreach ($file_fields as $field) {
        $uploaded = PluginBrandingConfig::handleUpload($field);
        if ($uploaded) {
            $old_config = PluginBrandingConfig::getForEntity($entity_id);
            if ($old_config && !empty($old_config[$field])) {
                $old_path = Plugin::getPhpDir('branding') . '/public/uploads/' . $old_config[$field];
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
            $data[$field] = $uploaded;
        }
        if (!empty($_POST['delete_' . $field])) {
            $data['delete_' . $field] = true;
        }
    }

    PluginBrandingConfig::saveConfig($entity_id, $data);
    Session::addMessageAfterRedirect(__('Branding settings saved successfully.', 'branding'), true, INFO);
    Html::redirect(Plugin::getWebDir('branding') . '/front/config.php?entity_id=' . $entity_id);
}

// ── Reset ────────────────────────────────────────────────────────
if (isset($_POST['reset'])) {
    Session::checkRight('config', UPDATE);
    $entity_id = intval($_POST['entity_id'] ?? 0);

    $data = [
        'is_recursive'     => 1,
        'primary_color'    => null,
        'sidebar_color'    => null,
        'custom_css'       => null,
        'login_custom_css' => null,
        'login_text'       => null,
        'page_title'       => null,
        'ui_style'         => null,
    ];

    $file_fields = ['logo_login', 'logo_sidebar', 'logo_sidebar_collapsed', 'favicon', 'login_background'];
    foreach ($file_fields as $field) {
        $data['delete_' . $field] = true;
    }

    PluginBrandingConfig::saveConfig($entity_id, $data);
    Session::addMessageAfterRedirect(__('Branding settings reset to defaults.', 'branding'), true, INFO);
    Html::redirect(Plugin::getWebDir('branding') . '/front/config.php?entity_id=' . $entity_id);
}

// ── Display ──────────────────────────────────────────────────────
$entity_id = intval($_GET['entity_id'] ?? 0);

Html::header(
    __('Branding', 'branding'),
    $_SERVER['PHP_SELF'],
    'config',
    'PluginBrandingConfig'
);

$config = new PluginBrandingConfig();
$config->showConfigForm($entity_id);

Html::footer();
