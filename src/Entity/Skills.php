<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillsRepository::class)
 */
class Skills
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $skills_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillsName(): ?string
    {
        return $this->skills_name;
    }

    public function setSkillsName(string $skills_name): self
    {
        $this->skills_name = $skills_name;

        return $this;
    }
}
