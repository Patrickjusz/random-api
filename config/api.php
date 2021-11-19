<?php
//DATABASE CONFIGURATION
define('DATABASE_TYPE', 'sqlite3');
define('DATABASE_HOST_OR_FILE',  __DIR__ . '/../data/app.db');

//CATCH THE REQUEST
define('REQUEST_URL', filter_var(rtrim($_GET['route'] ?? '', '/'), FILTER_SANITIZE_URL));
define('REQUEST_PARAM', $_POST ?? []);
define('REQUEST_HEADERS', getallheaders() ?? []);

//MIDDLEWARE
define('MIDDLEWARE_PATH', '\App\Middlewares');
$middlewares = ['ApiMiddleware'];

//API
define('API_PROTECTION_ENABLE', true);
define('API_HTTP_HEADER_NAME', 'x-authorization');
define('API_KEY', 'x24dN2lr7LrQdssd2eOsqhqSIaUarSTdfe2AfpUy94Vv1q');
