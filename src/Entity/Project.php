<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="projects")
     */
    private $users;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
        $this->users = new ArrayCollection();
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
