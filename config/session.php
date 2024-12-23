<?php

use Illuminate\Support\Str;

return [

    /*
    |----------------------------------------------------------------------
    | Default Session Driver
    |----------------------------------------------------------------------
    |
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. If you want to store session in cookies,
    | use "cookie" as the session driver.
    |
    */

    'driver' => env('SESSION_DRIVER', 'cookie'),

    /*
    |----------------------------------------------------------------------
    | Session Lifetime
    |----------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to expire immediately when the browser is closed, set this to 0.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |----------------------------------------------------------------------
    | Session Encryption
    |----------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it's stored in cookies.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', true),

    /*
    |----------------------------------------------------------------------
    | Session Cookie Name
    |----------------------------------------------------------------------
    |
    | This is the name of the cookie used to store the session identifier.
    | This value can be changed to match your application needs.
    |
    */

    'cookie' => env('SESSION_COOKIE', Str::slug(env('APP_NAME', 'laravel'), '_').'_session'),

    /*
    |----------------------------------------------------------------------
    | Session Cookie Path
    |----------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |----------------------------------------------------------------------
    | Session Cookie Domain
    |----------------------------------------------------------------------
    |
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |----------------------------------------------------------------------
    | HTTPS Only Cookies
    |----------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', false),

    /*
    |----------------------------------------------------------------------
    | HTTP Access Only
    |----------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |----------------------------------------------------------------------
    | Same-Site Cookies
    |----------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set this value to "lax" to permit secure cross-site requests.
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

];
