<?php
/* Handle CORS */

// // Specify domains from which requests are allowed
// header('Access-Control-Allow-Origin: *');

// // Specify which request methods are allowed
// header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

// // Additional headers which may be sent along with the CORS request
// header('Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type');

// // Set the age to 1 day to improve speed/caching.
// header('Access-Control-Max-Age: 86400');

// Exit early so the page isn't fully loaded for options requests
// if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
//     exit();
// }
     return [

//     /*
//     |--------------------------------------------------------------------------
//     | Cross-Origin Resource Sharing (CORS) Configuration
//     |--------------------------------------------------------------------------
//     |
//     | Here you may configure your settings for cross-origin resource sharing
//     | or "CORS". This determines what cross-origin operations may execute
//     | in web browsers. You are free to adjust these settings as needed.
//     |
//     | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
//     |
//     */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
    

];
