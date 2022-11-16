<?php

namespace App;

use League\Csv\Reader;

class Csv
{
    private string $documentName;
    private Reader $reader;

    public function __construct(string $documentName)
    {
       $this->documentName = $documentName;
       $this->reader = Reader::createFromPath($this->documentName, "r");
       $this->reader->setDelimiter(";");
       $this->reader->setHeaderOffset(0);
    }

    public function getRecords(){
        return $this->reader->getRecords();
    }

    /**
     * @return Reader
     */
    public function getReader(): Reader
    {
        return $this->reader;
    }
    /**
     *
     * @return Reader
     */
    /**
     * @return Reader
     */



}