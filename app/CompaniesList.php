<?php

namespace App;

class CompaniesList
{
    private array $list = [];

    /**
     * @param array $list
     */
    public function setList(Company $company): void
    {
        $this->list [] = $company;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    public function last30(): array{
        $listLength = count($this->list);
        $starIndex = $listLength - 30;

        return array_slice($this->list, $starIndex);


    }

    public function searchByName(string $name){
        foreach ($this->list as $company){
            if ($company->getName() === $name){
                return $company;
            }
        }

        return "Nav šāda ieraksta";
    }

    public function searchByReg(string $reg){
        foreach ($this->list as $company){
            if ($company->getRegNum() === $reg){
                return $company;
            }
        }
        return "Nav šāda ieraksta";
    }


}