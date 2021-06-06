<?php

namespace App\Entity;

use App\Repository\RolesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolesRepository::class)
 */
class Roles
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
    private $Admin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdmin(): ?string
    {
        return $this->Admin;
    }

    public function setAdmin(string $Admin): self
    {
        $this->Admin = $Admin;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): self
    {
        $this->User = $User;

        return $this;
    }
}
