<?php

ini_set('display_errors', 'stderr');
require __DIR__ . "/vendor/autoload.php";

$server = new \Spiral\GRPC\Server();
$server->registerService(\Service\EchoInterface::class, new \App\Service\EchoService());

$worker = new \Spiral\RoadRunner\Worker(new \Spiral\Goridge\StreamRelay(STDIN, STDOUT));
$server->serve($worker);
