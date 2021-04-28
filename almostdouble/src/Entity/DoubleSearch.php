<?php

namespace App\Entity;

class DoubleSearch{

    /**
     *
     * @var int
     */
    private $maxNumber;

    /**
     *
     * @var int
     */
    private $minNumber;

    /**
     *
     * @var bool
     */
    private $askResult;

    /**
     * Get the value of maxNumber
     *
     * @return  int
     */ 
    public function getMaxNumber()
    {
        return $this->maxNumber;
    }

    /**
     * Set the value of maxNumber
     *
     * @param  int  $maxNumber
     *
     * @return  self
     */ 
    public function setMaxNumber(int $maxNumber)
    {
        $this->maxNumber = $maxNumber;

        return $this;
    }

    /**
     * Get the value of minNumber
     *
     * @return  int
     */ 
    public function getMinNumber()
    {
        return $this->minNumber;
    }

    /**
     * Set the value of minNumber
     *
     * @param  int  $minNumber
     *
     * @return  self
     */ 
    public function setMinNumber(int $minNumber)
    {
        $this->minNumber = $minNumber;

        return $this;
    }

    /**
     * Get the value of askResult
     *
     * @return  bool
     */ 
    public function getAskResult()
    {
        return $this->askResult;
    }

    /**
     * Set the value of askResult
     *
     * @param  bool  $askResult
     *
     * @return  self
     */ 
    public function setAskResult(bool $askResult)
    {
        $this->askResult = $askResult;

        return $this;
    }
}