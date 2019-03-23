<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Service;

/**
 */
class EchoClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Service\Message $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Ping(\Service\Message $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/service.Echo/Ping',
        $argument,
        ['\Service\Message', 'decode'],
        $metadata, $options);
    }

}
