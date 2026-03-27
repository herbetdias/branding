<?php

class PluginBrandingConfig extends CommonDBTM {

    static $rightname = 'config';

    static function getTypeName($nb = 0): string {
        return __('Branding', 'branding');
    }

    static function getTable($classname = null): string {
        return 'glpi_plugin_branding_configs';
    }

    static function canCreate(): bool {
        return Session::haveRight('config', UPDATE);
    }

    static function canView(): bool {
        return Session::haveRight('config', READ);
    }

    // ── Preset Themes ──────────────────────────────────────────────

    static function getThemes(): array {
        return [
            'corporate_dark' => [
                'label'         => 'Corporate Dark',
                'sidebar_color' => '#1a202c',
                'primary_color' => '#3182ce',
            ],
            'corporate_blue' => [
                'label'         => 'Corporate Blue',
                'sidebar_color' => '#1e3a5f',
                'primary_color' => '#4299e1',
            ],
            'ocean' => [
                'label'         => 'Ocean',
                'sidebar_color' => '#0f3460',
                'primary_color' => '#00b5d8',
            ],
            'forest' => [
                'label'         => 'Forest',
                'sidebar_color' => '#1a3c34',
                'primary_color' => '#48bb78',
            ],
            'sunset' => [
                'label'         => 'Sunset',
                'sidebar_color' => '#4a1942',
                'primary_color' => '#f6ad55',
            ],
            'berry' => [
                'label'         => 'Berry',
                'sidebar_color' => '#2d1b4e',
                'primary_color' => '#d6bcfa',
            ],
            'slate' => [
                'label'         => 'Slate',
                'sidebar_color' => '#334155',
                'primary_color' => '#94a3b8',
            ],
            'ruby' => [
                'label'         => 'Ruby',
                'sidebar_color' => '#450a0a',
                'primary_color' => '#fc8181',
            ],
            'mint' => [
                'label'         => 'Mint',
                'sidebar_color' => '#134e4a',
                'primary_color' => '#81e6d9',
            ],
            'glpi_default' => [
                'label'         => 'GLPI Default',
                'sidebar_color' => '#2f3f64',
                'primary_color' => '#fec95c',
            ],
        ];
    }

    // ── UI Styles ────────────────────────────────────────────────────

    static function getUiStyles(): array {
        return [
            'default' => [
                'label' => 'GLPI Default',
                'description' => 'Original GLPI appearance, no changes.',
                'icon' => 'ti-layout-dashboard',
                'css' => '',
                'login_css' => '',
            ],
            'modern' => [
                'label' => 'Modern',
                'description' => 'Visual overhaul: pill buttons, large radius, elevated cards, gradient background.',
                'icon' => 'ti-sparkles',
                'css' => '
/* ══ MODERN UI ══ */
/* ── Tabler variable overrides ── */
html:root{
  --tblr-border-radius:16px;
  --tblr-border-radius-sm:10px;
  --tblr-border-radius-lg:20px;
  --tblr-border-radius-xl:1.5rem;
  --tblr-border-radius-xxl:2rem;
  --tblr-border-radius-pill:100rem;
  --tblr-box-shadow:0 2px 8px rgba(0,0,0,.06);
  --tblr-box-shadow-sm:0 1px 4px rgba(0,0,0,.04);
  --tblr-box-shadow-lg:0 12px 40px rgba(0,0,0,.1);
  --tblr-border-color:rgba(0,0,0,.07);
  --tblr-border-color-translucent:rgba(0,0,0,.05);
  --tblr-shadow-input:0 1px 2px rgba(0,0,0,.04);
  --tblr-body-bg:#f5f7fb;
}

/* ── Page background ── */
html body .page-wrapper,html body .page-body{background:#f5f7fb}
html body .page-body::before{content:"";position:fixed;top:0;left:0;right:0;height:300px;background:linear-gradient(135deg,rgba(var(--tblr-primary-rgb),.06) 0%,rgba(var(--tblr-primary-rgb),.02) 40%,transparent 70%);pointer-events:none;z-index:0}

/* ── Cards: elevated, big radius ── */
html body .card{border-radius:16px;border:1px solid rgba(0,0,0,.06);box-shadow:0 2px 8px rgba(0,0,0,.05);transition:all .25s ease;position:relative;overflow:hidden}
html body .card:hover{box-shadow:0 8px 24px rgba(0,0,0,.08);transform:translateY(-1px)}
html body .card .card-header{border-radius:16px 16px 0 0;background:transparent;border-bottom:1px solid rgba(0,0,0,.04);padding:1rem 1.25rem}
html body .card .card-footer{border-radius:0 0 16px 16px;border-top:1px solid rgba(0,0,0,.04)}
html body .card .card-body{padding:1.25rem}

/* ── Buttons: pill shape, glow, lift ── */
html body .btn{border-radius:10px;font-weight:600;transition:all .2s ease;letter-spacing:.02em;text-transform:none}
html body .btn:hover{transform:translateY(-2px);box-shadow:0 6px 16px rgba(0,0,0,.12)}
html body .btn:active{transform:translateY(0);box-shadow:0 2px 4px rgba(0,0,0,.08)}
html body .btn-primary{box-shadow:0 4px 12px rgba(var(--tblr-primary-rgb),.3)}
html body .btn-primary:hover{box-shadow:0 8px 20px rgba(var(--tblr-primary-rgb),.35)}
html body .btn-ghost-primary:hover,html body .btn-outline-primary:hover{background:rgba(var(--tblr-primary-rgb),.08)}
html body .btn-sm{border-radius:8px;font-size:.8rem}
html body .btn-lg{border-radius:14px}
html body .btn-pill{border-radius:100rem}

/* ── Forms: soft, glowing focus ── */
html body .form-control,html body .form-select{border-radius:10px;border:1.5px solid #e2e8f0;transition:all .2s ease;background:#fff}
html body .form-control:focus,html body .form-select:focus{border-color:var(--tblr-primary);box-shadow:0 0 0 4px rgba(var(--tblr-primary-rgb),.1);background:#fff}
html body .form-control::placeholder{color:#a0aec0}
html body .input-group{border-radius:10px;overflow:hidden}
html body .form-check-input{border-radius:6px}
html body .form-check-input:checked{box-shadow:0 2px 4px rgba(var(--tblr-primary-rgb),.3)}

/* ── Tables: clean, stripe-hover ── */
html body .table{border-collapse:separate;border-spacing:0}
html body .table thead th{border-bottom:2px solid #edf2f7;font-weight:700;text-transform:uppercase;font-size:.68rem;letter-spacing:.08em;color:#8896ab;padding:.85rem 1rem;background:transparent}
html body .table tbody tr{transition:all .15s ease}
html body .table tbody tr:hover{background:rgba(var(--tblr-primary-rgb),.04)}
html body .table td{padding:.75rem 1rem;border-bottom:1px solid #f1f5f9;vertical-align:middle}

/* ── Dropdown: floating, rounded ── */
html body .dropdown-menu{border-radius:14px;border:1px solid rgba(0,0,0,.06);box-shadow:0 12px 40px rgba(0,0,0,.12);padding:8px;background:#fff;animation:dropIn .15s ease}
html body .dropdown-item{border-radius:8px;padding:.5rem .85rem;transition:all .15s;font-weight:500}
html body .dropdown-item:hover{background:rgba(var(--tblr-primary-rgb),.06)}
html body .dropdown-item.active,html body .dropdown-item:active{border-radius:8px}
@keyframes dropIn{from{opacity:0;transform:translateY(-4px)}to{opacity:1;transform:translateY(0)}}

/* ── Sidebar: polished nav items ── */
html body .navbar-vertical .navbar-nav .nav-link{border-radius:0 12px 12px 0;margin:1px 10px 1px 0;padding:.55rem 1rem;transition:all .2s ease;font-weight:500}
html body .navbar-vertical .navbar-nav .nav-link:hover{background:rgba(255,255,255,.12)}
html body .navbar-vertical .navbar-nav .nav-link.active{background:rgba(255,255,255,.18);font-weight:600}
html body .navbar-vertical .navbar-nav .nav-link .nav-link-icon{opacity:.7;transition:opacity .2s}
html body .navbar-vertical .navbar-nav .nav-link:hover .nav-link-icon,html body .navbar-vertical .navbar-nav .nav-link.active .nav-link-icon{opacity:1}

/* ── Top header bar ── */
html body .navbar:not(.navbar-vertical){backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px)}

/* ── Modal: big radius, deep shadow ── */
html body .modal-content{border-radius:20px;border:0;box-shadow:0 24px 80px rgba(0,0,0,.15);overflow:hidden}
html body .modal-header{border-bottom:1px solid #f1f5f9;padding:1.25rem 1.5rem}
html body .modal-body{padding:1.5rem}
html body .modal-footer{border-top:1px solid #f1f5f9;padding:1rem 1.5rem}

/* ── Badges: pill, softer ── */
html body .badge{border-radius:8px;font-weight:600;letter-spacing:.02em;padding:.35em .65em}
html body .badge-pill,.badge.rounded-pill{border-radius:100rem}

/* ── Alerts: rounded, no harsh border ── */
html body .alert{border-radius:14px;border:0;box-shadow:0 2px 8px rgba(0,0,0,.04)}

/* ── Tabs: modern underline style ── */
html body .nav-tabs .nav-link{border-radius:10px 10px 0 0;font-weight:600;transition:all .2s;padding:.65rem 1.2rem}
html body .nav-tabs .nav-link.active{box-shadow:0 -2px 0 0 var(--tblr-primary) inset}
html body .nav-pills .nav-link{border-radius:10px}

/* ── Avatars ── */
html body .avatar{border-radius:12px}
html body .avatar-rounded,.avatar-circle{border-radius:50%}

/* ── Progress bars ── */
html body .progress{border-radius:100rem;height:.5rem;overflow:hidden}
html body .progress-bar{border-radius:100rem}

/* ── Pagination ── */
html body .page-item .page-link{border-radius:10px;margin:0 2px;transition:all .15s}
html body .page-item.active .page-link{box-shadow:0 2px 6px rgba(var(--tblr-primary-rgb),.3)}

/* ── Toast ── */
html body .toast{border-radius:14px;box-shadow:0 8px 24px rgba(0,0,0,.1)}

/* ── Scrollbar ── */
::-webkit-scrollbar{width:6px;height:6px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:#c4cdd8;border-radius:100rem}
::-webkit-scrollbar-thumb:hover{background:#94a3b8}

/* ── Selection color ── */
::selection{background:rgba(var(--tblr-primary-rgb),.15);color:inherit}
',
                'login_css' => '
/* ══ MODERN LOGIN ══ */
html:root{--tblr-border-radius:16px;--tblr-border-radius-sm:10px;--tblr-border-radius-lg:20px;--tblr-body-bg:#f5f7fb}
html body.page-anonymous,html body .page-anonymous{background:#f5f7fb}
html body .page-anonymous .card.main-content-card{border-radius:24px;box-shadow:0 24px 80px rgba(0,0,0,.08);border:1px solid rgba(255,255,255,.6);backdrop-filter:blur(10px);overflow:hidden}
html body .page-anonymous .card-header{border-bottom:0;padding:2rem 2rem 0}
html body .page-anonymous .card-body{padding:1.5rem 2rem 2rem}
html body .page-anonymous .btn{border-radius:12px;font-weight:600;transition:all .2s;padding:.6rem 1.5rem}
html body .page-anonymous .btn-primary{box-shadow:0 4px 16px rgba(var(--tblr-primary-rgb),.3)}
html body .page-anonymous .btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,0,0,.15)}
html body .page-anonymous .form-control{border-radius:12px;border:1.5px solid #e2e8f0;padding:.65rem 1rem;font-size:.9rem}
html body .page-anonymous .form-control:focus{border-color:var(--tblr-primary);box-shadow:0 0 0 4px rgba(var(--tblr-primary-rgb),.1)}
html body .page-anonymous .form-select{border-radius:12px}
',
            ],
            'clean' => [
                'label' => 'Clean Minimal',
                'description' => 'Flat design, no shadows, thin borders, maximum breathing room.',
                'icon' => 'ti-leaf',
                'css' => '
/* ══ CLEAN MINIMAL ══ */
html:root{
  --tblr-border-radius:10px;
  --tblr-border-radius-sm:6px;
  --tblr-border-radius-lg:14px;
  --tblr-border-radius-xl:1.25rem;
  --tblr-box-shadow:none;
  --tblr-box-shadow-sm:none;
  --tblr-box-shadow-lg:0 4px 20px rgba(0,0,0,.05);
  --tblr-border-color:#e8ecf1;
  --tblr-border-color-translucent:rgba(0,0,0,.05);
  --tblr-shadow-input:none;
  --tblr-body-bg:#fafbfc;
}

/* ── Page ── */
html body .page-wrapper,html body .page-body{background:#fafbfc}

/* ── Cards: flat, subtle ── */
html body .card{border:1px solid #e8ecf1;box-shadow:none;transition:border-color .2s}
html body .card:hover{border-color:#d1d8e0;box-shadow:none;transform:none}
html body .card .card-header{background:transparent;border-bottom:1px solid #f0f3f6;padding:1.1rem 1.25rem}
html body .card .card-body{padding:1.25rem}

/* ── Buttons: flat, clean ── */
html body .btn{font-weight:600;box-shadow:none;transition:all .15s}
html body .btn:hover{box-shadow:none;transform:none;filter:brightness(.96)}
html body .btn:active{filter:brightness(.92)}
html body .btn-primary{border:0}
html body .btn-outline-primary{border-width:1.5px}

/* ── Forms: flat ── */
html body .form-control,html body .form-select{border:1.5px solid #e2e8f0;box-shadow:none;transition:border-color .15s;background:#fff}
html body .form-control:focus,html body .form-select:focus{border-color:var(--tblr-primary);box-shadow:none}

/* ── Tables: minimal ── */
html body .table thead th{font-weight:700;font-size:.72rem;text-transform:uppercase;letter-spacing:.06em;color:#8896ab;background:transparent;border-bottom:2px solid #edf2f7;padding:.8rem .75rem}
html body .table td{border-bottom:1px solid #f4f6f8;padding:.7rem .75rem}
html body .table tbody tr:hover{background:#f8f9fb}

/* ── Sidebar: subtle ── */
html body .navbar-vertical .navbar-nav .nav-link{opacity:.75;transition:all .15s;font-weight:500}
html body .navbar-vertical .navbar-nav .nav-link:hover{opacity:.95;background:rgba(255,255,255,.08)}
html body .navbar-vertical .navbar-nav .nav-link.active{opacity:1;background:rgba(255,255,255,.12)}

/* ── Dropdown: flat ── */
html body .dropdown-menu{border:1px solid #e8ecf1;box-shadow:0 4px 16px rgba(0,0,0,.05);padding:4px}
html body .dropdown-item{border-radius:6px;font-weight:500;transition:background .15s}
html body .dropdown-item:hover{background:#f5f7fa}

/* ── Modal: flat ── */
html body .modal-content{border:1px solid #e8ecf1;box-shadow:0 8px 30px rgba(0,0,0,.06);border-radius:14px}

/* ── Badges: square-ish ── */
html body .badge{border-radius:6px;font-weight:600}

/* ── Tabs ── */
html body .nav-tabs .nav-link{font-weight:600;transition:all .15s}

/* ── Extra spacing ── */
html body .page-body .container-xl{padding-top:1.5rem}
html body .page-header{border-bottom:0;margin-bottom:.75rem}

/* ── Scrollbar ── */
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:#dde2e8;border-radius:100rem}
::-webkit-scrollbar-thumb:hover{background:#c4cdd8}
',
                'login_css' => '
/* ══ CLEAN MINIMAL LOGIN ══ */
html:root{--tblr-border-radius:10px;--tblr-border-radius-sm:6px;--tblr-border-radius-lg:14px;--tblr-box-shadow:none;--tblr-shadow-input:none;--tblr-body-bg:#fafbfc}
html body .page-anonymous .card.main-content-card{box-shadow:none;border:1px solid #e8ecf1}
html body .page-anonymous .btn{font-weight:600;box-shadow:none}
html body .page-anonymous .btn:hover{box-shadow:none;filter:brightness(.96)}
html body .page-anonymous .form-control{border:1.5px solid #e2e8f0}
html body .page-anonymous .form-control:focus{border-color:var(--tblr-primary);box-shadow:none}
',
            ],
            'glassmorphism' => [
                'label' => 'Glass',
                'description' => 'Frosted glass panels, transparency, blur effects, floating feel.',
                'icon' => 'ti-glass-full',
                'css' => '
/* ══ GLASSMORPHISM ══ */
html:root{
  --tblr-border-radius:18px;
  --tblr-border-radius-sm:12px;
  --tblr-border-radius-lg:22px;
  --tblr-border-radius-xl:1.75rem;
  --tblr-box-shadow:0 4px 24px rgba(0,0,0,.04);
  --tblr-box-shadow-lg:0 16px 48px rgba(0,0,0,.1);
  --tblr-border-color:rgba(255,255,255,.25);
  --tblr-border-color-translucent:rgba(255,255,255,.15);
  --tblr-body-bg:#eef2f7;
}

/* ── Page background ── */
html body .page-wrapper,html body .page-body{background:linear-gradient(135deg,#eef2f7 0%,#e2e8f0 50%,rgba(var(--tblr-primary-rgb),.05) 100%)}

/* ── Glass cards ── */
html body .card{background:rgba(255,255,255,.65);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border:1px solid rgba(255,255,255,.5);box-shadow:0 4px 24px rgba(0,0,0,.04);transition:all .3s ease}
html body .card:hover{box-shadow:0 12px 40px rgba(0,0,0,.08);background:rgba(255,255,255,.8);transform:translateY(-2px)}
html body .card .card-header{background:rgba(255,255,255,.3);border-bottom:1px solid rgba(255,255,255,.4);backdrop-filter:blur(4px)}
html body .card .card-body{padding:1.25rem}

/* ── Buttons ── */
html body .btn{font-weight:600;transition:all .2s;border-radius:12px}
html body .btn-primary{background:rgba(var(--tblr-primary-rgb),.8);backdrop-filter:blur(8px);border:1px solid rgba(var(--tblr-primary-rgb),.2);box-shadow:0 4px 16px rgba(var(--tblr-primary-rgb),.25)}
html body .btn-primary:hover{background:rgba(var(--tblr-primary-rgb),.92);transform:translateY(-2px);box-shadow:0 8px 24px rgba(var(--tblr-primary-rgb),.3)}
html body .btn-outline-primary{border:1.5px solid rgba(var(--tblr-primary-rgb),.3);background:rgba(255,255,255,.4);backdrop-filter:blur(4px)}
html body .btn-outline-primary:hover{background:rgba(var(--tblr-primary-rgb),.08)}

/* ── Forms ── */
html body .form-control,html body .form-select{background:rgba(255,255,255,.5);backdrop-filter:blur(8px);border:1.5px solid rgba(255,255,255,.6);transition:all .2s}
html body .form-control:focus,html body .form-select:focus{background:rgba(255,255,255,.85);border-color:rgba(var(--tblr-primary-rgb),.4);box-shadow:0 0 0 4px rgba(var(--tblr-primary-rgb),.08)}

/* ── Dropdown ── */
html body .dropdown-menu{background:rgba(255,255,255,.75);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.5);box-shadow:0 16px 48px rgba(0,0,0,.12);padding:8px}
html body .dropdown-item{border-radius:10px;transition:all .15s}
html body .dropdown-item:hover{background:rgba(var(--tblr-primary-rgb),.06)}

/* ── Modal ── */
html body .modal-content{background:rgba(255,255,255,.8);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.4);box-shadow:0 32px 100px rgba(0,0,0,.12);border-radius:24px}

/* ── Tables ── */
html body .table thead th{border-bottom:1px solid rgba(0,0,0,.06);font-weight:700;text-transform:uppercase;font-size:.68rem;letter-spacing:.06em;color:#6b7a8d}
html body .table tbody tr{transition:all .15s}
html body .table tbody tr:hover{background:rgba(var(--tblr-primary-rgb),.04)}
html body .table td{border-bottom:1px solid rgba(0,0,0,.03)}

/* ── Sidebar ── */
html body .navbar-vertical .navbar-nav .nav-link{border-radius:0 14px 14px 0;margin:2px 10px 2px 0;padding:.55rem 1rem;transition:all .25s}
html body .navbar-vertical .navbar-nav .nav-link:hover{background:rgba(255,255,255,.15)}
html body .navbar-vertical .navbar-nav .nav-link.active{background:rgba(255,255,255,.2)}

/* ── Badges ── */
html body .badge{border-radius:10px;font-weight:600;backdrop-filter:blur(4px)}

/* ── Tabs ── */
html body .nav-tabs .nav-link{border-radius:14px 14px 0 0;font-weight:600}
html body .nav-pills .nav-link{border-radius:12px;backdrop-filter:blur(4px)}

/* ── Scrollbar ── */
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:rgba(0,0,0,.12);border-radius:100rem}
::-webkit-scrollbar-thumb:hover{background:rgba(0,0,0,.2)}

/* ── Selection ── */
::selection{background:rgba(var(--tblr-primary-rgb),.15)}
',
                'login_css' => '
/* ══ GLASS LOGIN ══ */
html:root{--tblr-border-radius:18px;--tblr-border-radius-sm:12px;--tblr-border-radius-lg:22px;--tblr-body-bg:#eef2f7}
html body.page-anonymous,html body .page-anonymous{background:linear-gradient(135deg,#eef2f7,#e2e8f0,rgba(var(--tblr-primary-rgb),.05))}
html body .page-anonymous .card.main-content-card{border-radius:28px;background:rgba(255,255,255,.6);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.4);box-shadow:0 32px 100px rgba(0,0,0,.08)}
html body .page-anonymous .card-header{background:transparent;border-bottom:0}
html body .page-anonymous .card-body{padding:2rem}
html body .page-anonymous .btn{border-radius:14px;font-weight:600}
html body .page-anonymous .btn-primary{backdrop-filter:blur(8px);box-shadow:0 6px 20px rgba(var(--tblr-primary-rgb),.3)}
html body .page-anonymous .btn:hover{transform:translateY(-2px)}
html body .page-anonymous .form-control{border-radius:14px;background:rgba(255,255,255,.5);backdrop-filter:blur(8px);border:1.5px solid rgba(255,255,255,.6);padding:.65rem 1rem}
html body .page-anonymous .form-control:focus{background:rgba(255,255,255,.85);border-color:rgba(var(--tblr-primary-rgb),.4);box-shadow:0 0 0 4px rgba(var(--tblr-primary-rgb),.08)}
',
            ],
        ];
    }

    // ── Data Access ─────────────────────────────────────────────────

    static function getForCurrentEntity() {
        global $DB;

        $entity_id = $_SESSION['glpiactive_entity'] ?? 0;

        $iterator = $DB->request([
            'FROM'  => self::getTable(),
            'WHERE' => ['entities_id' => $entity_id],
            'LIMIT' => 1,
        ]);
        if (count($iterator)) {
            return $iterator->current();
        }

        // Recursive from parent entities
        $ancestors = getAncestorsOf('glpi_entities', $entity_id);
        if (!empty($ancestors)) {
            $iterator = $DB->request([
                'FROM'  => self::getTable(),
                'WHERE' => [
                    'entities_id'  => $ancestors,
                    'is_recursive' => 1,
                ],
                'ORDER' => 'entities_id DESC',
                'LIMIT' => 1,
            ]);
            if (count($iterator)) {
                return $iterator->current();
            }
        }

        // Fallback to root entity
        $iterator = $DB->request([
            'FROM'  => self::getTable(),
            'WHERE' => ['entities_id' => 0],
            'LIMIT' => 1,
        ]);
        return count($iterator) ? $iterator->current() : null;
    }

    static function getForEntity($entity_id) {
        global $DB;

        $iterator = $DB->request([
            'FROM'  => self::getTable(),
            'WHERE' => ['entities_id' => $entity_id],
            'LIMIT' => 1,
        ]);
        return count($iterator) ? $iterator->current() : null;
    }

    // ── Save / Delete ───────────────────────────────────────────────

    static function saveConfig($entity_id, $data) {
        global $DB;

        $table    = self::getTable();
        $existing = self::getForEntity($entity_id);

        $fields = [
            'entities_id'      => $entity_id,
            'is_recursive'     => $data['is_recursive'] ?? 1,
            'primary_color'    => $data['primary_color'] ?? null,
            'sidebar_color'    => $data['sidebar_color'] ?? null,
            'custom_css'       => $data['custom_css'] ?? null,
            'login_custom_css' => $data['login_custom_css'] ?? null,
            'login_text'       => $data['login_text'] ?? null,
            'page_title'       => $data['page_title'] ?? null,
            'ui_style'         => $data['ui_style'] ?? null,
            'date_mod'         => date('Y-m-d H:i:s'),
        ];

        $file_fields = ['logo_login', 'logo_sidebar', 'logo_sidebar_collapsed', 'favicon', 'login_background'];
        foreach ($file_fields as $field) {
            if (!empty($data[$field])) {
                // Delete old file
                if ($existing && !empty($existing[$field])) {
                    $old = Plugin::getPhpDir('branding') . '/public/uploads/' . $existing[$field];
                    if (file_exists($old)) {
                        unlink($old);
                    }
                }
                $fields[$field] = $data[$field];
            } elseif (!empty($data['delete_' . $field])) {
                if ($existing && !empty($existing[$field])) {
                    $old = Plugin::getPhpDir('branding') . '/public/uploads/' . $existing[$field];
                    if (file_exists($old)) {
                        unlink($old);
                    }
                }
                $fields[$field] = null;
            }
        }

        if ($existing) {
            $DB->update($table, $fields, ['id' => $existing['id']]);
        } else {
            $fields['date_creation'] = date('Y-m-d H:i:s');
            $DB->insert($table, $fields);
        }

        self::generateStaticFiles($entity_id);
        return true;
    }

    // ── Export / Import ─────────────────────────────────────────────

    static function exportConfig($entity_id) {
        $config = self::getForEntity($entity_id);
        if (!$config) {
            return '{}';
        }

        $export = [];
        $text_fields = [
            'primary_color', 'sidebar_color', 'custom_css',
            'login_custom_css', 'login_text', 'page_title', 'ui_style', 'is_recursive',
        ];
        foreach ($text_fields as $f) {
            $export[$f] = $config[$f] ?? null;
        }

        // Encode images as base64
        $file_fields = ['logo_login', 'logo_sidebar', 'logo_sidebar_collapsed', 'favicon', 'login_background'];
        foreach ($file_fields as $f) {
            if (!empty($config[$f])) {
                $path = Plugin::getPhpDir('branding') . '/public/uploads/' . $config[$f];
                if (file_exists($path)) {
                    $export['files'][$f] = [
                        'name' => $config[$f],
                        'data' => base64_encode(file_get_contents($path)),
                        'ext'  => pathinfo($config[$f], PATHINFO_EXTENSION),
                    ];
                }
            }
        }

        return json_encode($export, JSON_PRETTY_PRINT);
    }

    static function importConfig($entity_id, $json_string) {
        $import = json_decode($json_string, true);
        if (!$import) {
            return false;
        }

        $data = [
            'is_recursive'     => $import['is_recursive'] ?? 1,
            'primary_color'    => $import['primary_color'] ?? null,
            'sidebar_color'    => $import['sidebar_color'] ?? null,
            'custom_css'       => $import['custom_css'] ?? null,
            'login_custom_css' => $import['login_custom_css'] ?? null,
            'login_text'       => $import['login_text'] ?? null,
            'page_title'       => $import['page_title'] ?? null,
            'ui_style'         => $import['ui_style'] ?? null,
        ];

        // Restore files
        if (!empty($import['files'])) {
            $upload_dir = Plugin::getPhpDir('branding') . '/public/uploads/';
            foreach ($import['files'] as $field => $file_data) {
                $ext      = preg_replace('/[^a-z0-9]/', '', strtolower($file_data['ext'] ?? 'png'));
                $filename = $field . '_' . uniqid() . '.' . $ext;
                $decoded  = base64_decode($file_data['data'] ?? '');
                if ($decoded && file_put_contents($upload_dir . $filename, $decoded)) {
                    $data[$field] = $filename;
                }
            }
        }

        return self::saveConfig($entity_id, $data);
    }

    // ── File Upload ─────────────────────────────────────────────────

    static function handleUpload($field_name) {
        if (!isset($_FILES[$field_name]) || $_FILES[$field_name]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES[$field_name];

        // Validate MIME type
        $allowed_types = [
            'image/png', 'image/jpeg', 'image/gif', 'image/svg+xml',
            'image/x-icon', 'image/vnd.microsoft.icon', 'image/webp',
        ];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowed_types)) {
            Session::addMessageAfterRedirect(
                __('Invalid file type. Allowed: PNG, JPG, GIF, SVG, ICO, WEBP', 'branding'),
                false, ERROR
            );
            return null;
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            Session::addMessageAfterRedirect(
                __('File too large. Maximum size: 5MB', 'branding'),
                false, ERROR
            );
            return null;
        }

        $upload_dir = Plugin::getPhpDir('branding') . '/public/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $ext = preg_replace('/[^a-z0-9]/', '', $ext);
        $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'ico', 'webp'];
        if (!in_array($ext, $allowed_ext)) {
            $ext = 'png';
        }

        $filename = $field_name . '_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
            return $filename;
        }
        return null;
    }

    // ── Helpers ──────────────────────────────────────────────────────

    static function getUploadUrl($filename) {
        return empty($filename) ? '' : '/plugins/branding/uploads/' . $filename;
    }

    static function sanitizeCss($css) {
        $css = preg_replace('/<[^>]*>/', '', $css);
        $css = preg_replace('/javascript\s*:/i', '', $css);
        $css = preg_replace('/expression\s*\(/i', '', $css);
        return $css;
    }

    static function hexToRgb($hex) {
        $hex = ltrim($hex, '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        return hexdec(substr($hex, 0, 2)) . ', '
             . hexdec(substr($hex, 2, 2)) . ', '
             . hexdec(substr($hex, 4, 2));
    }

    // ── Static File Generation ──────────────────────────────────────

    static function generateStaticFiles($entity_id = 0) {
        $config     = self::getForEntity($entity_id);
        $plugin_dir = Plugin::getPhpDir('branding');
        $public_dir = $plugin_dir . '/public';
        $base_url   = '/plugins/branding/uploads/';

        // Build config JSON
        $json = [
            'logo_login' => '', 'logo_sidebar' => '', 'logo_sidebar_collapsed' => '',
            'favicon' => '', 'login_background' => '',
            'primary_color' => '', 'sidebar_color' => '',
            'custom_css' => '', 'login_custom_css' => '',
            'login_text' => '', 'page_title' => '', 'ui_style' => '',
        ];

        if ($config) {
            foreach (['logo_login', 'logo_sidebar', 'logo_sidebar_collapsed', 'favicon', 'login_background'] as $f) {
                if (!empty($config[$f])) {
                    $json[$f] = $base_url . $config[$f];
                }
            }
            foreach (['primary_color', 'sidebar_color', 'custom_css', 'login_custom_css', 'login_text', 'page_title', 'ui_style'] as $f) {
                $json[$f] = $config[$f] ?? '';
            }
        }

        file_put_contents($public_dir . '/config.json', json_encode($json));

        // ── Authenticated pages CSS ─────────────────────────────────
        $css  = "/* Branding plugin – auto-generated */\n";
        $vars = '';

        if (!empty($json['primary_color'])) {
            $c = $json['primary_color'];
            $vars .= "  --tblr-primary:{$c};--tblr-primary-rgb:" . self::hexToRgb($c) . ";\n";
        }
        if (!empty($json['sidebar_color'])) {
            $vars .= "  --glpi-mainmenu-bg:{$json['sidebar_color']};\n";
        }
        if (!empty($json['logo_sidebar'])) {
            $u = $json['logo_sidebar'];
            $vars .= "  --glpi-logo:url('{$u}');--glpi-logo-light:url('{$u}');--glpi-logo-dark:url('{$u}');\n";
        }
        if (!empty($json['logo_sidebar_collapsed'])) {
            $u = $json['logo_sidebar_collapsed'];
            $vars .= "  --glpi-logo-reduced:url('{$u}');--glpi-logo-light-reduced:url('{$u}');--glpi-logo-dark-reduced:url('{$u}');\n";
        }
        if ($vars) {
            $css .= "html:root{{$vars}}\n";
        }

        // Direct element overrides (backup)
        if (!empty($json['logo_sidebar'])) {
            $css .= ".page .glpi-logo{background:url('{$json['logo_sidebar']}') no-repeat!important;background-size:contain!important}\n";
        }
        if (!empty($json['logo_sidebar_collapsed'])) {
            $css .= "body.navbar-collapsed .navbar-brand .glpi-logo{background:url('{$json['logo_sidebar_collapsed']}') no-repeat!important;background-size:contain!important}\n";
        }
        // UI Style CSS
        if (!empty($json['ui_style']) && $json['ui_style'] !== 'default') {
            $styles = self::getUiStyles();
            if (isset($styles[$json['ui_style']]) && !empty($styles[$json['ui_style']]['css'])) {
                $css .= $styles[$json['ui_style']]['css'] . "\n";
            }
        }
        if (!empty($json['custom_css'])) {
            $css .= self::sanitizeCss($json['custom_css']) . "\n";
        }
        file_put_contents($public_dir . '/css/branding.css', $css);

        // ── Login page CSS ──────────────────────────────────────────
        $lcss  = "/* Branding plugin – login – auto-generated */\n";
        $lvars = '';

        if (!empty($json['primary_color'])) {
            $c = $json['primary_color'];
            $lvars .= "  --tblr-primary:{$c};--tblr-primary-rgb:" . self::hexToRgb($c) . ";\n";
        }
        if (!empty($json['logo_login'])) {
            $u = $json['logo_login'];
            $lvars .= "  --glpi-logo-dark-login:url('{$u}');--glpi-logo-light-login:url('{$u}');\n";
        }
        if ($lvars) {
            $lcss .= "html:root{{$lvars}}\n";
        }
        if (!empty($json['login_background'])) {
            $u = $json['login_background'];
            $lcss .= "body,.page-body,.login-page,#page{background-image:url('{$u}')!important;background-size:cover!important;background-position:center!important;background-repeat:no-repeat!important;background-attachment:fixed!important}\n";
        }
        if (!empty($json['login_text'])) {
            // Login text is injected via JS, but we add a container style
            $lcss .= ".branding-login-text{text-align:center;padding:12px 20px;margin-top:12px;font-size:0.9em;color:#64748b;max-width:400px}\n";
        }
        // UI Style login CSS
        if (!empty($json['ui_style']) && $json['ui_style'] !== 'default') {
            $styles = self::getUiStyles();
            if (isset($styles[$json['ui_style']]) && !empty($styles[$json['ui_style']]['login_css'])) {
                $lcss .= $styles[$json['ui_style']]['login_css'] . "\n";
            }
        }
        if (!empty($json['login_custom_css'])) {
            $lcss .= self::sanitizeCss($json['login_custom_css']) . "\n";
        }
        file_put_contents($public_dir . '/css/branding_login.css', $lcss);
    }

    // ── Config Form ─────────────────────────────────────────────────

    function showConfigForm($entity_id = 0) {
        $config = self::getForEntity($entity_id);
        $themes = self::getThemes();
        $action = Plugin::getWebDir('branding') . '/front/config.php';

        $palette_sidebar = [
            '#1a202c', '#1a1a2e', '#16213e', '#0f3460', '#1e3a5f',
            '#2f3f64', '#334155', '#2d3748', '#1a3c34', '#134e4a',
            '#285e61', '#276749', '#4a1942', '#2d1b4e', '#450a0a',
            '#4a5568', '#2c7a7b', '#744210', '#9c4221', '#6b46c1',
        ];
        $palette_accent = [
            '#fec95c', '#f6ad55', '#fde68a', '#faf089', '#fefcbf',
            '#48bb78', '#9ae6b4', '#81e6d9', '#00b5d8', '#67e8f9',
            '#3182ce', '#4299e1', '#63b3ed', '#90cdf4', '#bee3f8',
            '#fc8181', '#f687b3', '#d6bcfa', '#c4b5fd', '#94a3b8',
        ];

        echo '<form method="post" action="' . $action . '" enctype="multipart/form-data" id="branding-form">';
        echo '<input type="hidden" name="entity_id" value="' . (int)$entity_id . '">';
        echo '<input type="hidden" name="_glpi_csrf_token" value="' . Session::getNewCSRFToken() . '">';

        // ── Tabs navigation ─────────────────────────────────────────
        echo '<div class="card mb-4">';
        echo '<div class="card-header p-0 border-bottom-0">';
        echo '<ul class="nav nav-tabs card-header-tabs" role="tablist">';
        $tabs = [
            ['themes',  'ti-palette',       __('Themes', 'branding')],
            ['style',   'ti-sparkles',      __('UI Style', 'branding')],
            ['logos',   'ti-photo',         __('Logos', 'branding')],
            ['colors',  'ti-color-swatch',  __('Colors', 'branding')],
            ['text',    'ti-typography',     __('Text & Title', 'branding')],
            ['css',     'ti-code',          __('Custom CSS', 'branding')],
            ['tools',   'ti-tool',          __('Tools', 'branding')],
        ];
        foreach ($tabs as $i => [$id, $icon, $label]) {
            $active = $i === 0 ? ' active' : '';
            echo '<li class="nav-item"><a class="nav-link' . $active . '" data-bs-toggle="tab" href="#tab-' . $id . '" role="tab">';
            echo '<i class="ti ' . $icon . ' me-1"></i>' . $label . '</a></li>';
        }
        echo '</ul></div>';

        echo '<div class="card-body">';
        echo '<div class="tab-content">';

        // ══════════════════════════════════════════════════════════════
        // TAB: Themes
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane active" id="tab-themes" role="tabpanel">';
        echo '<p class="text-muted mb-3">' . __('Click a theme to preview instantly. Save to apply.', 'branding') . '</p>';
        echo '<div class="row g-3">';
        foreach ($themes as $key => $theme) {
            echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2">';
            echo '<div class="card card-sm cursor-pointer theme-card" onclick="applyTheme(\'' . $theme['sidebar_color'] . '\',\'' . $theme['primary_color'] . '\')">';
            echo '<div style="height:48px;background:linear-gradient(135deg,' . $theme['sidebar_color'] . ' 50%,' . $theme['primary_color'] . ' 50%);border-radius:4px 4px 0 0;"></div>';
            echo '<div class="card-body p-2 text-center"><small class="fw-medium">' . htmlspecialchars($theme['label']) . '</small></div>';
            echo '</div></div>';
        }
        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: UI Style
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-style" role="tabpanel">';
        echo '<p class="text-muted mb-3">' . __('Choose a UI style to modernize the GLPI interface. This applies global CSS enhancements.', 'branding') . '</p>';
        echo '<input type="hidden" name="ui_style" id="ui_style_input" value="' . htmlspecialchars($config['ui_style'] ?? 'default') . '">';
        echo '<div class="row g-3">';
        $ui_styles = self::getUiStyles();
        foreach ($ui_styles as $key => $style) {
            $is_active = ($config['ui_style'] ?? 'default') === $key;
            $border = $is_active ? 'border:2px solid var(--tblr-primary);' : 'border:2px solid transparent;';
            echo '<div class="col-md-6 col-lg-3">';
            echo '<div class="card h-100 cursor-pointer ui-style-card' . ($is_active ? ' active' : '') . '" data-style="' . $key . '" style="' . $border . 'transition:all .2s;" onclick="selectUiStyle(\'' . $key . '\')">';
            echo '<div class="card-body text-center p-4">';
            echo '<i class="ti ' . $style['icon'] . ' mb-3" style="font-size:2.5rem;color:' . ($is_active ? 'var(--tblr-primary)' : '#94a3b8') . ';transition:color .2s"></i>';
            echo '<h4 class="mb-1">' . htmlspecialchars($style['label']) . '</h4>';
            echo '<p class="text-muted small mb-0">' . htmlspecialchars($style['description']) . '</p>';
            if ($is_active) {
                echo '<span class="badge bg-primary mt-2">' . __('Active', 'branding') . '</span>';
            }
            echo '</div></div></div>';
        }
        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: Logos
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-logos" role="tabpanel">';

        // Entity row
        echo '<div class="row mb-4">';
        echo '<div class="col-md-6">';
        echo '<label class="form-label">' . __('Entity') . '</label>';
        Entity::dropdown([
            'name'      => 'entity_id',
            'value'     => $entity_id,
            'on_change' => 'this.form.action="' . $action . '?entity_id="+this.value;this.form.submit();',
        ]);
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<label class="form-label">' . __('Recursive') . '</label><div>';
        Dropdown::showYesNo('is_recursive', $config['is_recursive'] ?? 1);
        echo '</div></div></div>';

        $logos = [
            ['logo_sidebar',           __('Sidebar Logo', 'branding'),            '100 x 55 px',  '50px', 'ti-layout-sidebar'],
            ['logo_sidebar_collapsed', __('Sidebar Logo (collapsed)', 'branding'),'40 x 40 px',   '40px', 'ti-layout-sidebar-right'],
            ['logo_login',             __('Login Page Logo', 'branding'),          '220 x 130 px', '70px', 'ti-login'],
            ['favicon',                __('Favicon', 'branding'),                  '32 x 32 px',   '32px', 'ti-world'],
            ['login_background',       __('Login Background', 'branding'),         __('Large image', 'branding'), '80px', 'ti-photo'],
        ];

        echo '<div class="row g-3">';
        foreach ($logos as [$field, $label, $hint, $preview_h, $icon]) {
            $is_bg = ($field === 'login_background');
            $col = $is_bg ? 'col-12' : 'col-md-6 col-lg-4';

            echo '<div class="' . $col . '">';
            echo '<div class="card h-100">';
            echo '<div class="card-body">';
            echo '<div class="d-flex align-items-center mb-3">';
            echo '<span class="avatar avatar-sm bg-primary-lt me-2"><i class="ti ' . $icon . '"></i></span>';
            echo '<div><h4 class="card-title mb-0">' . $label . '</h4>';
            echo '<small class="text-muted">' . $hint . '</small></div></div>';

            if (!empty($config[$field])) {
                $bg = $is_bg ? 'background:#f1f5f9;' : 'background:repeating-conic-gradient(#f1f5f9 0% 25%,#fff 0% 50%) 0 0/16px 16px;';
                echo '<div class="text-center mb-2 p-2 rounded" style="' . $bg . '">';
                echo '<img src="' . self::getUploadUrl($config[$field]) . '" style="max-height:' . $preview_h . ';max-width:100%;object-fit:contain;">';
                echo '</div>';
                echo '<label class="form-check form-check-inline"><input type="checkbox" class="form-check-input" name="delete_' . $field . '" value="1">';
                echo '<span class="form-check-label text-danger">' . __('Remove') . '</span></label>';
            }

            echo '<input type="file" name="' . $field . '" accept="image/*' . ($field === 'favicon' ? ',.ico' : '') . '" class="form-control form-control-sm mt-2">';
            echo '</div></div></div>';
        }
        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: Colors
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-colors" role="tabpanel">';
        echo '<div class="row g-4">';

        // Sidebar color
        echo '<div class="col-md-6">';
        echo '<div class="card h-100"><div class="card-body">';
        echo '<h4 class="card-title d-flex align-items-center gap-2"><span class="avatar avatar-xs rounded" id="sidebar_preview" style="background:' . htmlspecialchars($config['sidebar_color'] ?? '#2f3f64') . '"></span>' . __('Sidebar / Header', 'branding') . '</h4>';
        echo '<p class="text-muted small mb-3">CSS: <code>--glpi-mainmenu-bg</code></p>';
        self::renderColorPicker('sidebar_color', $config['sidebar_color'] ?? '#2f3f64', $palette_sidebar);
        echo '</div></div></div>';

        // Accent color
        echo '<div class="col-md-6">';
        echo '<div class="card h-100"><div class="card-body">';
        echo '<h4 class="card-title d-flex align-items-center gap-2"><span class="avatar avatar-xs rounded" id="primary_preview" style="background:' . htmlspecialchars($config['primary_color'] ?? '#fec95c') . '"></span>' . __('Buttons / Accent', 'branding') . '</h4>';
        echo '<p class="text-muted small mb-3">CSS: <code>--tblr-primary</code></p>';
        self::renderColorPicker('primary_color', $config['primary_color'] ?? '#fec95c', $palette_accent);
        echo '</div></div></div>';

        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: Text & Title
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-text" role="tabpanel">';
        echo '<div class="row g-4">';

        echo '<div class="col-md-6">';
        echo '<label class="form-label"><i class="ti ti-browser me-1"></i>' . __('Page Title', 'branding') . '</label>';
        echo '<input type="text" name="page_title" value="' . htmlspecialchars($config['page_title'] ?? '') . '" class="form-control" placeholder="GLPI">';
        echo '<small class="form-hint">' . __('Replaces "GLPI" in browser tab title', 'branding') . '</small>';
        echo '</div>';

        echo '<div class="col-md-6">';
        echo '<label class="form-label"><i class="ti ti-message me-1"></i>' . __('Login Page Text', 'branding') . '</label>';
        echo '<textarea name="login_text" rows="3" class="form-control" placeholder="' . __('Ex: Internal system - authorized access only', 'branding') . '">' . htmlspecialchars($config['login_text'] ?? '') . '</textarea>';
        echo '<small class="form-hint">' . __('Displayed below the login form', 'branding') . '</small>';
        echo '</div>';

        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: Custom CSS
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-css" role="tabpanel">';
        echo '<div class="row g-4">';

        echo '<div class="col-md-6">';
        echo '<label class="form-label"><i class="ti ti-code me-1"></i>' . __('Custom CSS (authenticated pages)', 'branding') . '</label>';
        echo '<textarea name="custom_css" rows="10" class="form-control" style="font-family:\'JetBrains Mono\',monospace;font-size:12px;line-height:1.5;background:#1e293b;color:#e2e8f0;border:0;border-radius:8px;padding:16px;" spellcheck="false">' . htmlspecialchars($config['custom_css'] ?? '') . '</textarea>';
        echo '</div>';

        echo '<div class="col-md-6">';
        echo '<label class="form-label"><i class="ti ti-code me-1"></i>' . __('Custom CSS (login page)', 'branding') . '</label>';
        echo '<textarea name="login_custom_css" rows="10" class="form-control" style="font-family:\'JetBrains Mono\',monospace;font-size:12px;line-height:1.5;background:#1e293b;color:#e2e8f0;border:0;border-radius:8px;padding:16px;" spellcheck="false">' . htmlspecialchars($config['login_custom_css'] ?? '') . '</textarea>';
        echo '</div>';

        echo '</div></div>';

        // ══════════════════════════════════════════════════════════════
        // TAB: Tools
        // ══════════════════════════════════════════════════════════════
        echo '<div class="tab-pane" id="tab-tools" role="tabpanel">';
        echo '<div class="row g-4">';

        echo '<div class="col-md-4"><div class="card"><div class="card-body text-center p-4">';
        echo '<i class="ti ti-download mb-2" style="font-size:2rem;color:var(--tblr-primary);"></i>';
        echo '<h4>' . __('Export', 'branding') . '</h4>';
        echo '<p class="text-muted small">' . __('Download configuration as JSON (includes images).', 'branding') . '</p>';
        echo '<button type="button" class="btn btn-primary w-100" onclick="exportConfig()"><i class="ti ti-download me-1"></i>' . __('Export', 'branding') . '</button>';
        echo '</div></div></div>';

        echo '<div class="col-md-4"><div class="card"><div class="card-body text-center p-4">';
        echo '<i class="ti ti-upload mb-2" style="font-size:2rem;color:var(--tblr-primary);"></i>';
        echo '<h4>' . __('Import', 'branding') . '</h4>';
        echo '<p class="text-muted small">' . __('Load configuration from a JSON file.', 'branding') . '</p>';
        echo '<label class="btn btn-outline-primary w-100 mb-0"><i class="ti ti-upload me-1"></i>' . __('Import', 'branding') . '';
        echo '<input type="file" name="import_file" accept=".json" onchange="document.getElementById(\'btn-import\').click();" style="display:none;"></label>';
        echo '<button type="submit" name="import" id="btn-import" style="display:none;"></button>';
        echo '</div></div></div>';

        echo '<div class="col-md-4"><div class="card border-danger"><div class="card-body text-center p-4">';
        echo '<i class="ti ti-trash mb-2" style="font-size:2rem;color:var(--tblr-danger,#d63939);"></i>';
        echo '<h4 class="text-danger">' . __('Reset', 'branding') . '</h4>';
        echo '<p class="text-muted small">' . __('Remove all customizations and restore defaults.', 'branding') . '</p>';
        echo '<button type="submit" name="reset" class="btn btn-outline-danger w-100" onclick="return confirm(\'' . __('Are you sure? This will remove all branding settings.', 'branding') . '\')">';
        echo '<i class="ti ti-trash me-1"></i>' . __('Reset', 'branding') . '</button>';
        echo '</div></div></div>';

        echo '</div></div>';

        echo '</div>'; // tab-content
        echo '</div>'; // card-body
        echo '</div>'; // card

        // ── Save bar (sticky) ───────────────────────────────────────
        echo '<div class="card mt-0" style="position:sticky;bottom:0;z-index:100;box-shadow:0 -2px 8px rgba(0,0,0,.08);">';
        echo '<div class="card-body py-3 d-flex justify-content-end gap-2">';
        echo '<button type="submit" name="save" class="btn btn-primary btn-lg px-5"><i class="ti ti-device-floppy me-1"></i>' . __('Save') . '</button>';
        echo '</div></div>';

        Html::closeForm();

        // ── Inline JS ───────────────────────────────────────────────
        echo '<script>
function applyTheme(sb,ac){
    document.getElementById("sidebar_color").value=sb;
    document.getElementsByName("sidebar_color_hex")[0].value=sb;
    document.getElementById("primary_color").value=ac;
    document.getElementsByName("primary_color_hex")[0].value=ac;
    livePreview();
}
function livePreview(){
    var sb=document.getElementById("sidebar_color").value;
    var ac=document.getElementById("primary_color").value;
    document.documentElement.style.setProperty("--glpi-mainmenu-bg",sb);
    document.documentElement.style.setProperty("--tblr-primary",ac);
    var sp=document.getElementById("sidebar_preview");if(sp)sp.style.background=sb;
    var pp=document.getElementById("primary_preview");if(pp)pp.style.background=ac;
}
document.getElementById("sidebar_color").addEventListener("input",livePreview);
document.getElementById("primary_color").addEventListener("input",livePreview);
function exportConfig(){
    window.location="' . $action . '?action=export&entity_id=' . (int)$entity_id . '";
}
function selectUiStyle(key){
    document.getElementById("ui_style_input").value=key;
    document.querySelectorAll(".ui-style-card").forEach(function(c){
        var isActive=c.dataset.style===key;
        c.style.border=isActive?"2px solid var(--tblr-primary)":"2px solid transparent";
        c.classList.toggle("active",isActive);
        var icon=c.querySelector(".ti");if(icon)icon.style.color=isActive?"var(--tblr-primary)":"#94a3b8";
        var badge=c.querySelector(".badge");
        if(isActive&&!badge){var b=document.createElement("span");b.className="badge bg-primary mt-2";b.textContent="Active";c.querySelector(".card-body").appendChild(b);}
        if(!isActive&&badge)badge.remove();
    });
}
document.querySelectorAll(".theme-card").forEach(function(c){
    c.addEventListener("mouseenter",function(){this.style.transform="translateY(-2px)";this.style.boxShadow="0 4px 12px rgba(0,0,0,.1)";});
    c.addEventListener("mouseleave",function(){this.style.transform="";this.style.boxShadow="";});
});
document.querySelectorAll(".ui-style-card").forEach(function(c){
    c.addEventListener("mouseenter",function(){if(!this.classList.contains("active"))this.style.border="2px solid #cbd5e1";this.style.transform="translateY(-2px)";this.style.boxShadow="0 4px 12px rgba(0,0,0,.08)";});
    c.addEventListener("mouseleave",function(){if(!this.classList.contains("active"))this.style.border="2px solid transparent";this.style.transform="";this.style.boxShadow="";});
});
</script>';
        echo '<style>
.theme-card{transition:transform .15s,box-shadow .15s;cursor:pointer}
.ui-style-card{cursor:pointer;border-radius:12px!important}
.nav-tabs .nav-link{font-weight:500;padding:.75rem 1.25rem}
.nav-tabs .nav-link.active{border-bottom:2px solid var(--tblr-primary)}
</style>';
    }

    // ── Color picker widget ─────────────────────────────────────────

    static function renderColorPicker($name, $value, $palette) {
        echo '<div class="d-flex align-items-center gap-2 mb-2">';
        echo '<input type="color" name="' . $name . '" id="' . $name . '" value="' . htmlspecialchars($value) . '" style="width:48px;height:40px;padding:2px;border:2px solid #e2e8f0;border-radius:8px;cursor:pointer;background:transparent;">';
        echo '<input type="text" name="' . $name . '_hex" value="' . htmlspecialchars($value) . '" class="form-control form-control-sm" style="width:90px;font-family:monospace;font-size:13px;" ';
        echo 'oninput="document.getElementById(\'' . $name . '\').value=this.value;livePreview();">';
        echo '</div>';
        echo '<div class="d-flex flex-wrap gap-1">';
        foreach ($palette as $color) {
            echo '<span onclick="document.getElementById(\'' . $name . '\').value=\'' . $color . '\';document.getElementsByName(\'' . $name . '_hex\')[0].value=\'' . $color . '\';livePreview();" ';
            echo 'class="rounded" style="display:inline-block;width:24px;height:24px;background:' . $color . ';cursor:pointer;border:2px solid transparent;transition:all .12s;" ';
            echo 'onmouseover="this.style.transform=\'scale(1.15)\';this.style.borderColor=\'#fff\';this.style.boxShadow=\'0 0 0 2px ' . $color . '\'" ';
            echo 'onmouseout="this.style.transform=\'\';this.style.borderColor=\'transparent\';this.style.boxShadow=\'\'" title="' . $color . '"></span>';
        }
        echo '</div>';
    }
}
