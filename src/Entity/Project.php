<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="project_id")
     */
    private $project_name;

    public function __construct()
    {
        $this->project_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getProjectName(): Collection
    {
        return $this->project_name;
    }

    public function addProjectName(User $projectName): self
    {
        if (!$this->project_name->contains($projectName)) {
            $this->project_name[] = $projectName;
            $projectName->setProjectId($this);
        }

        return $this;
    }

    public function removeProjectName(User $projectName): self
    {
        if ($this->project_name->removeElement($projectName)) {
            // set the owning side to null (unless already changed)
            if ($projectName->getProjectId() === $this) {
                $projectName->setProjectId(null);
            }
        }

        return $this;
    }
}
