<?php

namespace App\Utils;

use App\Utils\SpacesDashes;
use App\Utils\Capitalize;
use App\Utils\Logger;

class Transform
{
    private Capitalize $capitalize;
    private SpacesDashes $spaceDashes;
    private Logger $logger;
    private String $message;

    public function __construct(Capitalize $capitalize, SpacesDashes $spacesDashes, Logger $logger) {
        $this->capitalize = $capitalize;
        $this->spaceDashes = $spacesDashes;
        $this->logger = $logger;
    }

    public function transform(String $message, String $className) {
        if ($className === "Capitalize") {
            $this->message = $this->capitalize->transform($this->message);
        }elseif ($className === "SpacesDashes") {
            $this->message = $this->spaceDashes->transform($this->message);
        }

        return $this->message;
    }

    public function setMessage(String $message) {
        $this->message = $message;
    }

    public function log() {
        $this->logger->log($this->message);
    }
}