<?php

ini_set('display_errors', 'stderr');
require __DIR__ . "/../vendor/autoload.php";

$sf = new \SensioLabs\Consul\ServiceFactory([
    'base_uri' => 'http://0.0.0.0:18500',
]);

/** @var \SensioLabs\Consul\Services\Health $health */
$health = $sf->get('health');

$services = $health->service('grpc', [
    'passing' => true,
])->json();

$healthServices = [];
foreach ($services as $service) {
    $healthServices[] = $service['Service'];
}
var_dump(array_column($healthServices, 'Address', 'Port'));

$key = array_rand($healthServices, 1);
$service = $healthServices[$key];

$hostname = $service['Address'] . ':' . $service['Port'];

$client = new \Service\EchoClient($hostname, [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

$message = new \Service\Message();
$message->setMsg('Hello Echo.ping');

/** @var \Service\Message $reply */
list($reply, $status) = $client->Ping($message)->wait();
$msg = $reply->getMsg();

print $msg . PHP_EOL;
var_dump($status);
