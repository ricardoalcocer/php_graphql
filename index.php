<?php
    require('vendor/autoload.php');

    use App\Models\Artist;
    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'mysql.ricardoalcocer.com',
        'database'  => 'graphqldemo',
        'username'  => 'graphqldemo',
        'password'  => 'GQLDemo!',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $artist = Artist::all();

    print_r(json_encode($artist->toArray()));