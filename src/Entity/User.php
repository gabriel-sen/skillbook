<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
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
     * @ORM\OneToOne(targetEntity=role::class, inversedBy="role_name", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $role_id;

    /**
     * @ORM\ManyToOne(targetEntity=skills::class, inversedBy="skill_name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skills_id;

    /**
     * @ORM\ManyToOne(targetEntity=BusinessUnit::class, inversedBy="bu_name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bu_id;

    /**
     * @ORM\ManyToOne(targetEntity=project::class, inversedBy="project_name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project_id;


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

    public function getRoleId(): ?role
    {
        return $this->role_id;
    }

    public function setRoleId(role $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function getSkillsId(): ?skills
    {
        return $this->skills_id;
    }

    public function setSkillsId(?skills $skills_id): self
    {
        $this->skills_id = $skills_id;

        return $this;
    }

    public function getBuId(): ?BusinessUnit
    {
        return $this->bu_id;
    }

    public function setBuId(?BusinessUnit $bu_id): self
    {
        $this->bu_id = $bu_id;

        return $this;
    }

    public function getProjectId(): ?project
    {
        return $this->project_id;
    }

    public function setProjectId(?project $project_id): self
    {
        $this->project_id = $project_id;

        return $this;
    }

}
