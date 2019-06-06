<?php

namespace Omneo\Qantas\Requests;

use Carbon\Carbon;

class MemberValidate extends AbstractRequest
{
    /**
     * @var int
     */
    protected $frequentFlyerId;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @return int
     */
    public function getFrequentFlyerId()
    {
        return $this->frequentFlyerId;
    }

    /**
     * @param int $frequentFlyerId
     * @return MemberValidate
     */
    public function setFrequentFlyerId($frequentFlyerId)
    {
        $this->frequentFlyerId = $frequentFlyerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return MemberValidate
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'memberId' => $this->getFrequentFlyerId(),
            'criteria' => ['surname' => $this->getSurname()]
        ];
    }

}
