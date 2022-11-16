<?php

namespace App;

class Company
{
    private string $name;
    private string $regnum;


    public function __construct(string $name, string $regnum)
    {
        $this->name = $name;
        $this->regnum = $regnum;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRegNum(): string
    {
        return $this->regnum;
    }


}