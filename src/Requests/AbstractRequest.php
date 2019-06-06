<?php

namespace Omneo\Qantas\Requests;

class AbstractRequest implements \JsonSerializable
{

    /**
     * @return Array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
