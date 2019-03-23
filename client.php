<?php

ini_set('display_errors', 'stderr');
require __DIR__ . "/vendor/autoload.php";

$client = new \Service\EchoClient('127.0.0.1:9001', [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

$message = new \Service\Message();
$message->setMsg('Hello Echo.ping');

/** @var \Service\Message $reply */
list($reply, $status) = $client->Ping($message)->wait();
$msg = $reply->getMsg();

print $msg . PHP_EOL;
var_dump($status);
