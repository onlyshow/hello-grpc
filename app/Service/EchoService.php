<?php

namespace App\Service;

use Service\EchoInterface;
use Service\Message;
use Spiral\GRPC;

/**
 * Class EchoService
 *
 * @package \App\Service
 */
class EchoService implements EchoInterface
{
    public function Ping(GRPC\ContextInterface $ctx, Message $in): Message
    {
        $out = new Message();
        return $out->setMsg(strtoupper($in->getMsg()));
    }
}
