<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="role_id", cascade={"persist", "remove"})
     */
    private $role_name;

    public function getRoleName(): ?User
    {
        return $this->role_name;
    }

    public function setRoleName(User $role_name): self
    {
        // set the owning side of the relation if necessary
        if ($role_name->getRoleId() !== $this) {
            $role_name->setRoleId($this);
        }

        $this->role_name = $role_name;

        return $this;
    }

}
