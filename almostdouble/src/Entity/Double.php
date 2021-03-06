<?php

namespace App\Entity;

use App\Repository\DoubleRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=DoubleRepository::class)
 * @ORM\Table(name="`double`")
 * @UniqueEntity(fields={"number1", "number2"}, message="Ce double existe déjà")
 */
class Double
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=0,max=100)
     */
    private $number1;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=0,max=100)
     */
    private $number2;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $askResult = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug() : string
    {
        return (new Slugify())->slugify("$this->number1$this->number2");
    }

    public function getNumber1(): ?int
    {
        return $this->number1;
    }

    public function setNumber1(int $number1): self
    {
        $this->number1 = $number1;

        return $this;
    }

    public function getNumber2(): ?int
    {
        return $this->number2;
    }

    public function setNumber2(int $number2): self
    {
        $this->number2 = $number2;

        return $this;
    }

    public function getAskResult(): ?bool
    {
        return $this->askResult;
    }

    public function setAskResult(bool $askResult): self
    {
        $this->askResult = $askResult;

        return $this;
    }
}
