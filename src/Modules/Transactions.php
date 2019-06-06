<?php

namespace Omneo\Qantas\Modules;

use Omneo\Qantas\Entities;
use Omneo\Qantas\Parsers;
use Omneo\Qantas\Requests;
use Omneo\Qantas\Exceptions;
use Carbon\Carbon;

Class Transactions Extends AbstractModule
{
    /**
     * @param int $frequentFlyerNumber
     * @param Requests\TransactionFinalizeQuote $request
     * @return Entities\Transaction
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function finalizeQuote(int $frequentFlyerNumber, Requests\TransactionFinalizeQuote $request)
    {
        return (new Parsers\TransactionParser())->parse(
            $this->client->request(
                'POST',
                'member/v2/members/' . $frequentFlyerNumber . '/transactions',
                ['json' => $request]
            )
        );
    }

    /**
     * @param int $frequentFlyerNumber
     * @param Requests\TransactionComplete $request
     * @return Entities\Transaction
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function completeTransaction(int $frequentFlyerNumber, Requests\TransactionComplete $request)
    {
        return (new Parsers\TransactionParser())->parse(
            $this->client->request(
                'PUT',
                'member/v1/members/' . $frequentFlyerNumber . '/transactions',
                ['json' => $request]
            )
        );
    }

    /**
     * @param int $frequentFlyerNumber
     * @param int $transactionNumber
     * @param Requests\TransactionVoid $request
     * @return Entities\Transaction
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function voidTransaction(int $frequentFlyerNumber, int $transactionNumber, Requests\TransactionVoid $request)
    {
        return (new Parsers\TransactionParser())->parse(
            $this->client->request(
                'PUT',
                'member/v1/members/' . $frequentFlyerNumber . '/voidedtransactions/' . $transactionNumber,
                ['json' => $request]
            )
        );
    }
}