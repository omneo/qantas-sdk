<?php

namespace Omneo\Qantas\Parsers;

use Omneo\Qantas\Entities;

class TransactionParser
{
    /**
     * Parse the given payload to a WidgetFinalise entity.
     *
     * @param $payload
     * @return Entities\Transaction
     */
    public function parse($payload)
    {
        $widgetFinalise = (new Entities\Transaction())
            ->setTransactionNumber($payload->transactionNumber)
            ->setPointsBurned($payload->pointsBurned)
            ->setPointsEarned($payload->pointsEarned)
            ->setPointsBalanceDelta($payload->pointsBalanceDelta)
            ->setMessage($payload->message);

        if(!empty($payload->pointsValueInDollars)) $widgetFinalise->setPointsValueInDollars((int) $payload->pointsValueInDollars);

        return $widgetFinalise;
    }
}