<?php

namespace Omneo\Qantas\Modules;

use Omneo\Qantas\Entities;
use Omneo\Qantas\Parsers;
use Omneo\Qantas\Exceptions;
use Omneo\Qantas\Requests;

Class Validation Extends AbstractModule
{
    /**
     * @param Requests\MemberValidate $request
     * @return Entities\Member
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function validateMember(Requests\MemberValidate $request)
    {
        return (new Parsers\ValidationParser)->parse(
            $result = $this->client->request(
                'POST',
                'validation/members',
                ['json' => $request]
            )
        );

        dump($result);
    }
}