<?php

namespace Omneo\Qantas\Parsers;

use Omneo\Qantas\Entities;

class MemberParser
{
    /**
     * Parse the given payload to a Member entity.
     *
     * @param $payload
     * @return Entities\Member
     */
    public function parse($payload)
    {
        $member = (new Entities\Member)
            ->setId($payload->frequentFlyerId)
            ->setTitle($payload->title)
            ->setFirstName($payload->firstName)
            ->setLastName($payload->surname)
            ->setTier($payload->tier);

        return $member;
    }
}