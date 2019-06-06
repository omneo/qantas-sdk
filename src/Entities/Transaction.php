<?php

namespace Omneo\Qantas\Entities;

use Carbon\Carbon;

class Transaction extends AbstractEntity
{
    /**
     * @var int
     */
    protected $transactionNumber;

    /**
     * @var int
     */
    protected $pointsBurned;

    /**
     * @var int
     */
    protected $pointsEarned;

    /**
     * @var int
     */
    protected $pointsBalanceDelta;

    /**
     * @var int
     */
    protected $pointsValueInDollars;

    /**
     * @var string
     */
    protected $message;

    /**
     * @return int
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * @param int $transactionNumber
     * @return Transaction
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointsBurned()
    {
        return $this->pointsBurned;
    }

    /**
     * @param int $pointsBurned
     * @return Transaction
     */
    public function setPointsBurned($pointsBurned)
    {
        $this->pointsBurned = $pointsBurned;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointsEarned()
    {
        return $this->pointsEarned;
    }

    /**
     * @param int $pointsEarned
     * @return Transaction
     */
    public function setPointsEarned($pointsEarned)
    {
        $this->pointsEarned = $pointsEarned;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointsBalanceDelta()
    {
        return $this->pointsBalanceDelta;
    }

    /**
     * @param int $pointsBalanceDelta
     * @return Transaction
     */
    public function setPointsBalanceDelta($pointsBalanceDelta)
    {
        $this->pointsBalanceDelta = $pointsBalanceDelta;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointsValueInDollars()
    {
        return $this->pointsValueInDollars;
    }

    /**
     * @param int $pointsValueInDollars
     * @return Transaction
     */
    public function setPointsValueInDollars($pointsValueInDollars)
    {
        $this->pointsValueInDollars = $pointsValueInDollars;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Transaction
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Array
     */
    public function jsonSerialize()
    {
        $result = get_object_vars($this);

        return $result;
    }

}
