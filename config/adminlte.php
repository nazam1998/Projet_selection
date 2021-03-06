<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Selection',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>NKN</b>',
    'logo_img' => '/img/navIconWhite.png',
    'logo_img_class' => 'brand-image elevation-1',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Accueil',
            'url'         => '/',
            'icon'        => 'fas fa-home',
        ],
        [
            'header' => 'Annonce',
            'can'=>'annonce',
        ],
        [
            'text'        => 'Annonces',
            'url'         => 'annonce',
            'icon'        => 'fas fa-microphone',
            'can'=>'annonce',
        ],
        [
            'header' => 'Évènement',
            'can'=>'evenement',
        ],
        [
            'text'        => 'Évènements',
            'url'         => 'evenement',
            'icon'        => 'far fa-calendar-alt',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'evenement',
                ],
                [
                    'text' => 'Ajoutez un evenement',
                    'url'  => 'evenement/create',
                ],
            ],
        ],
        [
            'text'        => 'Titre',
            'url'         => 'titre',
            'icon'        => 'fas fa-heading',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'titre',
                ],
                [
                    'text' => 'Ajoutez un titre',
                    'url'  => 'titre/create',
                ],
            ],
        ],
        [
            'text'        => 'Description',
            'url'         => 'description',
            'icon'        => 'far fa-file-alt',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'description',
                ],
                [
                    'text' => 'Ajoutez un description',
                    'url'  => 'description/create',
                ],
            ],
        ],
        [
            'header' => 'Formulaire Inscription',
            'can'=>'evenement',
        ],
        
        [
            'text'        => 'Liste des Candidats',
            'url'         => 'candidat',
            'icon'        => 'fas fa-users',
            'can'=>'candidat',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'candidat',
                    'can'=>'candidat',
                ],
            ],
        ],
        [
            'text'        => 'Formulaires',
            'url'         => 'formulaire',
            'icon'        => 'fas fa-marker',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'formulaire',
                ],
                [
                    'text' => 'Ajoutez un formulaire',
                    'url'  => 'formulaire/create',
                ],
            ],
        ],
        [
            'text'        => 'Interets',
            'url'         => 'interet',
            'icon'        => 'fas fa-boxes',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'interet',
                ],
                [
                    'text' => 'Ajoutez un interet',
                    'url'  => 'interet/create',
                ],
            ],
        ],
        [
            'text'        => 'Matieres',
            'url'         => 'matiere',
            'icon'        => 'fas fa-language',
            'can'=>'evenement',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'matiere',
                ],
                [
                    'text' => 'Ajoutez une matiere',
                    'url'  => 'matiere/create',
                ],
            ],
        ],
        [
            'header' => 'Users',
            'can'=>'groupe',
        ],
        [
            'text'        => "Liste d'utilisateurs",
            'url'         => 'users',
            'icon'        => 'fas fa-users',
            'icon_color'  => 'yellow',
            'can'=>'groupe',
        ],
        
        
        [
            'text'        => 'Suivi du staff',
            'url'         => 'suivi/staff',
            'icon'        => 'fas fa-user-friends',
            'icon_color'  => 'yellow',
            'can'=>'suivi',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'suivi/staff',
                    'icon_color' => 'cyan'
                ],
            ],
        ],
        [
            'text'        => 'Suivi des students',
            'url'         => 'suivi/student',
            'icon'        => 'fas fa-user',
            'icon_color'  => 'yellow',
            'can'=>'suivi',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'suivi/student',
                    'icon_color' => 'cyan'
                ],
            ],
        ],
        [
            'header' => 'Groupes',
            'can'=>'groupe',
        ],
        [
            'text'        => 'Groupes',
            'url'         => 'group',
            'icon'        => 'fas fa-users',
            'icon_color'  => 'yellow',
            'can'=>'groupe',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'group',
                    'icon_color' => 'cyan'
                ],
                [
                    'text' => 'Ajoutez un groupe',
                    'url'  => 'group/create',
                    'icon_color' => 'yellow'
                ],
            ],
        ],
        [
            'header' => 'Roles',
            'can'=>'admin',
        ],
        [
            'text'        => 'Roles',
            'url'         => 'role',
            'icon'        => 'fas fa-users',
            'icon_color'  => 'yellow',
            'can'=>'admin',
            'submenu' => [
                [
                    'text' => 'Base de données',
                    'url'  => 'role',
                    'icon_color' => 'cyan'
                ],
                [
                    'text' => 'Ajoutez un role',
                    'url'  => 'role/create',
                    'icon_color' => 'yellow'
                ],
            ],
        ],
        [
            'can'=>'contact',
            'header' => 'Contact'
        ],
        [
            'text'=>'Reçus',
            'url'=>'contact',
            'can'=>'contact',
        ],
        [
            'text'=>'Envoyés',
            'url'=>'mailing',
            'can'=>'contact',
        ],
        [
            'text'=>'Envoyer',
            'can'=>'contact',
            'submenu'=>
            [
                [
                    'text'=>'Personne',
                    'url'=>'mailing/personne',
                    'icon'=>'fas fa-grip-lines'
                ],
                [
                    'text'=>'Groupe',
                    'url'=>'mailing/group',
                    'icon'=>'fas fa-grip-lines'
                ],
                [
                    'text'=>'Role',
                    'url'=>'mailing/role',
                    'icon'=>'fas fa-grip-lines'
                ],
            ],
        ],
        


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
