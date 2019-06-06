<?php

namespace Omneo\Qantas\Modules;

use Omneo\Qantas\Entities;
use Omneo\Qantas\Parsers;
use Omneo\Qantas\Exceptions;
use Omneo\Qantas\Requests;

Class Members Extends AbstractModule
{
    /**
     * @param int $frequentFlyerNumber
     * @return Entities\Member
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function getMemberProfile(int $frequentFlyerNumber)
    {
        return (new Parsers\MemberParser)->parse(
            $this->client->request(
                'GET', 'member/v1/members/' . $frequentFlyerNumber . '/profile'
            )
        );
    }
}