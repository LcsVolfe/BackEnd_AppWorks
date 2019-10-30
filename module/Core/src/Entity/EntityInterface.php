<?php

namespace Core\Entity;

interface EntityInterface
{

    public function getArrayCopy();

    public function setData($data);

}