<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/test' => [[['_route' => 'app_lucky_test', '_controller' => 'App\\Controller\\LuckyController::test'], null, null, null, false, false, null]],
        '/scss_test' => [[['_route' => 'app_lucky_test_scss', '_controller' => 'App\\Controller\\LuckyController::test_scss'], null, null, null, false, false, null]],
        '/scss_file' => [[['_route' => 'scss_file', '_controller' => 'App\\Controller\\LuckyController::scss_file'], null, null, null, false, false, null]],
        '/product' => [
            [['_route' => 'create_product', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, null, null, false, false, null],
            [['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null],
        ],
        '/task_success' => [[['_route' => 'task_success', '_controller' => 'App\\Controller\\TaskController::success'], null, null, null, false, false, null]],
        '/user_data' => [[['_route' => 'app_userdata_new', '_controller' => 'App\\Controller\\UserDataController::new'], null, null, null, false, false, null]],
        '/user_data_sql' => [[['_route' => 'app_userdatasql_welcome', '_controller' => 'App\\Controller\\UserDataSQLController::welcome'], null, null, null, false, false, null]],
        '/user_data_sql/login' => [[['_route' => 'user_data_login', '_controller' => 'App\\Controller\\UserDataSQLController::login'], null, null, null, false, false, null]],
        '/user_data_sql/add' => [[['_route' => 'app_userdatasql_new', '_controller' => 'App\\Controller\\UserDataSQLController::new'], null, null, null, false, false, null]],
        '/user/data/sql' => [[['_route' => 'app_user_data_s_q_l', '_controller' => 'App\\Controller\\UserDataSQLController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/user_data_sql/(?'
                    .'|task/([^/]++)/([^/]++)(*:209)'
                    .'|d(?'
                        .'|elete/([^/]++)/([^/]++)(*:244)'
                        .'|isplay/([^/]++)/([^/]++)(*:276)'
                    .')'
                    .'|panel/([^/]++)/([^/]++)(*:308)'
                    .'|update/([^/]++)/([^/]++)(*:340)'
                    .'|([^/]++)(*:356)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        209 => [[['_route' => 'user_data_task', '_controller' => 'App\\Controller\\TaskController::taskByEmail'], ['email', 'password'], null, null, false, true, null]],
        244 => [[['_route' => 'user_data_delete', '_controller' => 'App\\Controller\\UserDataSQLController::delete'], ['email', 'password'], null, null, false, true, null]],
        276 => [[['_route' => 'user_data_display', '_controller' => 'App\\Controller\\UserDataSQLController::display'], ['email', 'password'], null, null, false, true, null]],
        308 => [[['_route' => 'user_data_panel', '_controller' => 'App\\Controller\\UserDataSQLController::panelByEmail'], ['email', 'password'], null, null, false, true, null]],
        340 => [[['_route' => 'user_data_update', '_controller' => 'App\\Controller\\UserDataSQLController::updateByEmail'], ['email', 'password'], null, null, false, true, null]],
        356 => [
            [['_route' => 'user_data_showByName', '_controller' => 'App\\Controller\\UserDataSQLController::showByName'], ['name'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
