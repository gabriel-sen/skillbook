<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="user")
 */
class User implements UserInterface
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
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="users", cascade={"persist"})
     * @JoinTable(name="user_roles")
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="users", cascade={"persist"})
     * @JoinTable(name="user_skills")
     */
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity=BusinessUnit::class, inversedBy="users", cascade={"persist"})
     * @JoinTable(name="user_business_units")
     */
    private $businessUnits;

    /**
     * @ORM\ManyToMany(targetEntity=Project::class, inversedBy="users", cascade={"persist"})
     * @JoinTable(name="user_projects")
     */
    private $projects;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->businessUnits = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->projects = new ArrayCollection();
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

    public function getSkills(): ArrayCollection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): void
    {
        if ($this->skills->contains($skill)) {
            return;
        }

        $this->skills->add($skill);
    }

    public function getBusinessUnits(): Collection
    {
        return $this->businessUnits;
    }

    public function addBusinessUnit(BusinessUnit $businessUnit): void
    {
        if ($this->businessUnits->contains($businessUnit)) {
            return;
        }

        $this->businessUnits->add($businessUnit);
    }

    public function getProject(): ArrayCollection
    {
        return $this->projects;
    }

    public function addProject(Project $project): void
    {
        if ($this->projects->contains($project)) {
            return;
        }

        $this->projects->add($project);
    }

    public function getRoles(): ArrayCollection
    {
        return $this->roles;
    }

    public function addRole(Role $role): void
    {
        if ($this->roles->contains($role)) {
            return;
        }

        $this->roles->add($role);
    }

    public function register(
        array $businessUnits,
        array $skills,
        array $projects,
        array $roles
    ): void {
        foreach ($businessUnits as $businessUnit) {
            $this->addBusinessUnit($businessUnit);
        }
        foreach ($skills as $skill) {
            $this->addSkill($skill);
        }
        foreach ($projects as $project) {
            $this->addProject($project);
        }
        foreach ($roles as $role) {
            $this->addRole($role);
        }
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
