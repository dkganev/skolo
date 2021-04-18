<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_OBJ,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '10.0.0.19010.0.0.190'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '10.0.0.199'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        
        'pgsql2' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST2', '10.0.0.199'),
            'port' => env('DB_PORT2', '5432'),
            'database' => env('DB_DATABASE2', 'forge'),
            'username' => env('DB_USERNAME2', 'forge'),
            'password' => env('DB_PASSWORD2', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        
        'pgsql3' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST3', '10.0.0.199'),
            'port' => env('DB_PORT3', '5432'),
            'database' => env('DB_DATABASE3', 'forge'),
            'username' => env('DB_USERNAME3', 'forge'),
            'password' => env('DB_PASSWORD3', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        
        'pgsql4' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST4', '10.0.0.199'),
            'port' => env('DB_PORT4', '5432'),
            'database' => env('DB_DATABASE4', 'forge'),
            'username' => env('DB_USERNAME4', 'forge'),
            'password' => env('DB_PASSWORD4', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ], 
        
        'pgsql5' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST5', '10.0.0.199'),
            'port' => env('DB_PORT5', '5432'),
            'database' => env('DB_DATABASE5', 'forge'),
            'username' => env('DB_USERNAME5', 'forge'),
            'password' => env('DB_PASSWORD5', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        'pgsql6' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST6', '10.0.0.199'),
            'port' => env('DB_PORT6', '5432'),
            'database' => env('DB_DATABASE6', 'forge'),
            'username' => env('DB_USERNAME6', 'forge'),
            'password' => env('DB_PASSWORD6', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        'pgsql7' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST7', '10.0.0.199'),
            'port' => env('DB_PORT7', '5432'),
            'database' => env('DB_DATABASE7', 'forge'),
            'username' => env('DB_USERNAME7', 'forge'),
            'password' => env('DB_PASSWORD7', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql107' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST107', '10.0.0.199'),
            'port' => env('DB_PORT107', '5432'),
            'database' => env('DB_DATABASE107', 'forge'),
            'username' => env('DB_USERNAME107', 'forge'),
            'password' => env('DB_PASSWORD107', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql110' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST110', '10.0.0.199'),
            'port' => env('DB_PORT110', '5432'),
            'database' => env('DB_DATABASE110', 'forge'),
            'username' => env('DB_USERNAME110', 'forge'),
            'password' => env('DB_PASSWORD110', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        
        'pgsql111' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST111', '10.0.0.199'),
            'port' => env('DB_PORT111', '5432'),
            'database' => env('DB_DATABASE111', 'forge'),
            'username' => env('DB_USERNAME111', 'forge'),
            'password' => env('DB_PASSWORD111', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        
        'pgsql112' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST112', '10.0.0.199'),
            'port' => env('DB_PORT112', '5432'),
            'database' => env('DB_DATABASE112', 'forge'),
            'username' => env('DB_USERNAME112', 'forge'),
            'password' => env('DB_PASSWORD112', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql113' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST113', '10.0.0.199'),
            'port' => env('DB_PORT113', '5432'),
            'database' => env('DB_DATABASE113', 'forge'),
            'username' => env('DB_USERNAME113', 'forge'),
            'password' => env('DB_PASSWORD113', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql114' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST114', '10.0.0.199'),
            'port' => env('DB_PORT114', '5432'),
            'database' => env('DB_DATABASE114', 'forge'),
            'username' => env('DB_USERNAME114', 'forge'),
            'password' => env('DB_PASSWORD114', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql115' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST115', '10.0.0.199'),
            'port' => env('DB_PORT115', '5432'),
            'database' => env('DB_DATABASE115', 'forge'),
            'username' => env('DB_USERNAME115', 'forge'),
            'password' => env('DB_PASSWORD115', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql116' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST116', '10.0.0.199'),
            'port' => env('DB_PORT116', '5432'),
            'database' => env('DB_DATABASE116', 'forge'),
            'username' => env('DB_USERNAME116', 'forge'),
            'password' => env('DB_PASSWORD116', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql117' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST117', '10.0.0.199'),
            'port' => env('DB_PORT117', '5432'),
            'database' => env('DB_DATABASE117', 'forge'),
            'username' => env('DB_USERNAME117', 'forge'),
            'password' => env('DB_PASSWORD117', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql118' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST118', '10.0.0.199'),
            'port' => env('DB_PORT118', '5432'),
            'database' => env('DB_DATABASE118', 'forge'),
            'username' => env('DB_USERNAME118', 'forge'),
            'password' => env('DB_PASSWORD118', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql119' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST119', '10.0.0.199'),
            'port' => env('DB_PORT119', '5432'),
            'database' => env('DB_DATABASE119', 'forge'),
            'username' => env('DB_USERNAME119', 'forge'),
            'password' => env('DB_PASSWORD119', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql120' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST120', '10.0.0.199'),
            'port' => env('DB_PORT120', '5432'),
            'database' => env('DB_DATABASE120', 'forge'),
            'username' => env('DB_USERNAME120', 'forge'),
            'password' => env('DB_PASSWORD120', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        
        'pgsql121' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST121', '10.0.0.199'),
            'port' => env('DB_PORT121', '5432'),
            'database' => env('DB_DATABASE121', 'forge'),
            'username' => env('DB_USERNAME121', 'forge'),
            'password' => env('DB_PASSWORD121', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        
        'pgsql122' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST122', '10.0.0.199'),
            'port' => env('DB_PORT122', '5432'),
            'database' => env('DB_DATABASE122', 'forge'),
            'username' => env('DB_USERNAME122', 'forge'),
            'password' => env('DB_PASSWORD122', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql124' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST124', '10.0.0.199'),
            'port' => env('DB_PORT124', '5432'),
            'database' => env('DB_DATABASE124', 'forge'),
            'username' => env('DB_USERNAME124', 'forge'),
            'password' => env('DB_PASSWORD124', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql140' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST140', '10.0.0.199'),
            'port' => env('DB_PORT140', '5432'),
            'database' => env('DB_DATABASE140', 'forge'),
            'username' => env('DB_USERNAME140', 'forge'),
            'password' => env('DB_PASSWORD140', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql141' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST141', '10.0.0.199'),
            'port' => env('DB_PORT141', '5432'),
            'database' => env('DB_DATABASE141', 'forge'),
            'username' => env('DB_USERNAME141', 'forge'),
            'password' => env('DB_PASSWORD141', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql142' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST142', '10.0.0.199'),
            'port' => env('DB_PORT142', '5432'),
            'database' => env('DB_DATABASE142', 'forge'),
            'username' => env('DB_USERNAME142', 'forge'),
            'password' => env('DB_PASSWORD142', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql145' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST145', '10.0.0.199'),
            'port' => env('DB_PORT145', '5432'),
            'database' => env('DB_DATABASE145', 'forge'),
            'username' => env('DB_USERNAME145', 'forge'),
            'password' => env('DB_PASSWORD145', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql146' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST146', '10.0.0.199'),
            'port' => env('DB_PORT146', '5432'),
            'database' => env('DB_DATABASE146', 'forge'),
            'username' => env('DB_USERNAME146', 'forge'),
            'password' => env('DB_PASSWORD146', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql148' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST148', '10.0.0.199'),
            'port' => env('DB_PORT148', '5432'),
            'database' => env('DB_DATABASE148', 'forge'),
            'username' => env('DB_USERNAME148', 'forge'),
            'password' => env('DB_PASSWORD148', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql149' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST149', '10.0.0.199'),
            'port' => env('DB_PORT149', '5432'),
            'database' => env('DB_DATABASE149', 'forge'),
            'username' => env('DB_USERNAME149', 'forge'),
            'password' => env('DB_PASSWORD149', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        
        'pgsql150' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST150', '10.0.0.199'),
            'port' => env('DB_PORT150', '5432'),
            'database' => env('DB_DATABASE150', 'forge'),
            'username' => env('DB_USERNAME150', 'forge'),
            'password' => env('DB_PASSWORD150', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       
        
        'pgsql151' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST151', '10.0.0.199'),
            'port' => env('DB_PORT151', '5432'),
            'database' => env('DB_DATABASE151', 'forge'),
            'username' => env('DB_USERNAME151', 'forge'),
            'password' => env('DB_PASSWORD151', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql152' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST152', '10.0.0.199'),
            'port' => env('DB_PORT152', '5432'),
            'database' => env('DB_DATABASE152', 'forge'),
            'username' => env('DB_USERNAME152', 'forge'),
            'password' => env('DB_PASSWORD152', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql153' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST153', '10.0.0.199'),
            'port' => env('DB_PORT153', '5432'),
            'database' => env('DB_DATABASE153', 'forge'),
            'username' => env('DB_USERNAME153', 'forge'),
            'password' => env('DB_PASSWORD153', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql154' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST154', '10.0.0.199'),
            'port' => env('DB_PORT154', '5432'),
            'database' => env('DB_DATABASE154', 'forge'),
            'username' => env('DB_USERNAME154', 'forge'),
            'password' => env('DB_PASSWORD154', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql157' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST157', '10.0.0.199'),
            'port' => env('DB_PORT157', '5432'),
            'database' => env('DB_DATABASE157', 'forge'),
            'username' => env('DB_USERNAME157', 'forge'),
            'password' => env('DB_PASSWORD157', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql158' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST158', '10.0.0.199'),
            'port' => env('DB_PORT158', '5432'),
            'database' => env('DB_DATABASE158', 'forge'),
            'username' => env('DB_USERNAME158', 'forge'),
            'password' => env('DB_PASSWORD158', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql159' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST159', '10.0.0.199'),
            'port' => env('DB_PORT159', '5432'),
            'database' => env('DB_DATABASE159', 'forge'),
            'username' => env('DB_USERNAME159', 'forge'),
            'password' => env('DB_PASSWORD159', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql160' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST160', '10.0.0.199'),
            'port' => env('DB_PORT160', '5432'),
            'database' => env('DB_DATABASE160', 'forge'),
            'username' => env('DB_USERNAME160', 'forge'),
            'password' => env('DB_PASSWORD160', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql162' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST162', '10.0.0.199'),
            'port' => env('DB_PORT162', '5432'),
            'database' => env('DB_DATABASE162', 'forge'),
            'username' => env('DB_USERNAME162', 'forge'),
            'password' => env('DB_PASSWORD162', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       

        'pgsql163' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST163', '10.0.0.199'),
            'port' => env('DB_PORT163', '5432'),
            'database' => env('DB_DATABASE163', 'forge'),
            'username' => env('DB_USERNAME163', 'forge'),
            'password' => env('DB_PASSWORD163', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],       



    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
