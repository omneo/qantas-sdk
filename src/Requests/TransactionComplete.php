<?php

namespace Omneo\Qantas\Requests;

use Carbon\Carbon;

class TransactionComplete extends AbstractRequest
{
    /**
     * @var string
     */
    protected $totalCurrencyAmount;

    /**
     * @var string
     */
    protected $terminalId;

    /**
     * @var string
     */
    protected $clientReference;

    /**
     * @var string
     */
    protected $statementText;

    /**
     * @var Carbon
     */
    protected $timeStamp;

    /**
     * @return string
     */
    public function getTotalCurrencyAmount()
    {
        return $this->totalCurrencyAmount;
    }

    /**
     * @param string $totalCurrencyAmount
     * @return TransactionComplete
     */
    public function setTotalCurrencyAmount($totalCurrencyAmount)
    {
        $this->totalCurrencyAmount = $totalCurrencyAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getTerminalId()
    {
        return $this->terminalId;
    }

    /**
     * @param string $terminalId
     * @return TransactionComplete
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientReference()
    {
        return $this->clientReference;
    }

    /**
     * @param string $clientReference
     * @return TransactionComplete
     */
    public function setClientReference($clientReference)
    {
        $this->clientReference = $clientReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatementText()
    {
        return $this->statementText;
    }

    /**
     * @param string $statementText
     * @return TransactionComplete
     */
    public function setStatementText($statementText)
    {
        $this->statementText = $statementText;
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
            'totalCurrencyAmount'  => $this->getTotalCurrencyAmount(),
            'terminalId'           => $this->getTerminalId(),
            'clientRef'            => $this->getClientReference(),
            'statementText'        => $this->getStatementText(),
            'timestamp'            => $this->getTimeStamp()->toIso8601String()
        ];
    }

}
