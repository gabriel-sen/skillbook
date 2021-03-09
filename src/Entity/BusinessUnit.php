<?php

namespace App\Entity;

use App\Repository\BusinessUnitRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $bu_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuName(): ?string
    {
        return $this->bu_name;
    }

    public function setBuName(string $bu_name): self
    {
        $this->bu_name = $bu_name;

        return $this;
    }
}
