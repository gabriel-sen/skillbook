<?php

namespace App\Entity;

use App\Repository\BusinessUnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusinessUnitRepository::class)
 */
class BusinessUnit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="bu_id")
     */
    private $bu_name;

    public function __construct()
    {
        $this->bu_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getBuName(): Collection
    {
        return $this->bu_name;
    }

    public function addBuName(User $buName): self
    {
        if (!$this->bu_name->contains($buName)) {
            $this->bu_name[] = $buName;
            $buName->setBuId($this);
        }

        return $this;
    }

    public function removeBuName(User $buName): self
    {
        if ($this->bu_name->removeElement($buName)) {
            // set the owning side to null (unless already changed)
            if ($buName->getBuId() === $this) {
                $buName->setBuId(null);
            }
        }

        return $this;
    }

}
