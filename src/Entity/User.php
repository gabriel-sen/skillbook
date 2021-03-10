<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2083)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="role_name", mappedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity=Skills::class, inversedBy="skill_name", mappedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity=BusinessUnit::class, inversedBy="bu_name", mappedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bu;

    /**
     * @ORM\ManyToMany(targetEntity=Project::class, inversedBy="project_name",mappedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $project;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(role $role): self
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * @return Collection|Skills[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function setSkills(?skills $skills): self
    {
        $this->skills[] = $skills;
        return $this;
    }

    public function getBu(): ?string
    {
        return $this->bu;
    }

    public function setBu(?BusinessUnit $bu): self
    {
        $this->bu[] = $bu;

        return $this;
    }

    public function getProject(): ?string
    {
        return $this->project;
    }

    public function setProject(?project $project): self
    {
        $this->project[] = $project;

        return $this;
    }

}
