<?php

namespace Omneo\Qantas\Requests;

use Carbon\Carbon;

class TransactionFinalizeQuote extends AbstractRequest
{
    /**
     * @var string
     */
    protected $quoteReference;

    /**
     * @var Carbon
     */
    protected $timeStamp;

    /**
     * @return string
     */
    public function getQuoteReference()
    {
        return $this->quoteReference;
    }

    /**
     * @param string $quoteReference
     * @return TransactionFinalizeQuote
     */
    public function setQuoteReference($quoteReference)
    {
        $this->quoteReference = $quoteReference;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * @param Carbon $timeStamp
     * @return TransactionFinalizeQuote
     */
    public function setTimeStamp(Carbon $timeStamp = null)
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'quoteRef'  => $this->getQuoteReference(),
            'timestamp' => $this->getTimeStamp()->toIso8601String()
        ];
    }

}
