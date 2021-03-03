<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="skills_id")
     */
    private $skill_name;

    public function __construct()
    {
        $this->skill_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getSkillName(): Collection
    {
        return $this->skill_name;
    }

    public function addSkillName(User $skillName): self
    {
        if (!$this->skill_name->contains($skillName)) {
            $this->skill_name[] = $skillName;
            $skillName->setSkillsId($this);
        }

        return $this;
    }

    public function removeSkillName(User $skillName): self
    {
        if ($this->skill_name->removeElement($skillName)) {
            // set the owning side to null (unless already changed)
            if ($skillName->getSkillsId() === $this) {
                $skillName->setSkillsId(null);
            }
        }

        return $this;
    }
}
