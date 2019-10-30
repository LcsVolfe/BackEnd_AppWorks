<?php

namespace Core\Entity;

abstract class AbstractEntity implements EntityInterface
{

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }


    public function setData($data)
    {
        foreach ($data as $key => $value)
            $this->$key = $value;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}