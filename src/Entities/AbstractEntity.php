<?php

namespace Omneo\Qantas\Entities;

class AbstractEntity implements \JsonSerializable
{

    /**
     * @return Array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
