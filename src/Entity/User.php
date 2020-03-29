<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User Implements UserInterface, \Serializable
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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


    /**
     * @return string[]
     */
    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * @return null|string
     */
    public function getSalt()
    {

        return null;
    }

    /**
     * @return mixed
     */
    public function eraseCredentials()
    {
    }

    /**
     * @return string
     */
    public function serialize()
    {
       return serialize([
           $this->id,
           $this->username,
           $this->password
       ]);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
       list (
           $this->id,
           $this->username,
           $this->password
           ) = unserialize($serialized,['allowed_classes'=>false]);
    }
}
