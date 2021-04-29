<?php

namespace App\Entity;

use App\Repository\ListeCouplesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass=ListeCouplesRepository::class)
 */
class ListeCouples
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Double::class)
     */
    private $Couples;

    public function __construct()
    {
        $this->Couples = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify("$this->id");
    }

    /**
     * @return Collection|Double[]
     */
    public function getCouples(): Collection
    {
        return $this->Couples;
    }

    public function addCouple(Double $couple): self
    {
        if (!$this->Couples->contains($couple)) {
            $this->Couples[] = $couple;
        }

        return $this;
    }

    public function removeCouple(Double $couple): self
    {
        $this->Couples->removeElement($couple);

        return $this;
    }
}
