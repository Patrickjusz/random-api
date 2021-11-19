<?php
//DATABASE CONFIGURATION
define('DATABASE_TYPE', 'sqlite3');
define('DATABASE_HOST_OR_FILE',  __DIR__ . '/../data/app.db');

//CATCH THE REQUEST
define('REQUEST_URL', $_GET['route'] ?? '');
define('REQUEST_PARAM', $_POST ?? []);
define('REQUEST_HEADERS', getallheaders() ?? []);