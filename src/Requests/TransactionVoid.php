<?php

namespace Omneo\Qantas\Requests;

use Carbon\Carbon;

class TransactionVoid extends AbstractRequest
{
    /**
     * @var string
     */
    protected $reason;

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return TransactionVoid
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'reason'  => $this->getReason()
        ];
    }

}
