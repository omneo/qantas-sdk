<?php

namespace Omneo\Qantas\Parsers;

use Omneo\Qantas\Entities;

class ValidationParser
{
    /**
     * Parse the given payload to a Member entity.
     *
     * @param $payload
     * @return Entities\Member
     */
    public function parse($payload)
    {
        $validation = (new Entities\Validation())
            ->setStatus($payload->status)
            ->setMessage($payload->message);

        return $validation;
    }
}