<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;




/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
    * fields = {"email"},
    * message = "L'email que vous avez indiqué est dèjà utiliser"
 * )
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8" , minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $password;

   
    /**
     * @Assert\EqualTo(propertyPath="password" , message="Mots de passes différents")
     */
    public $confirm_pass; 

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLES_USER'] ; 
        
    }

    public function eraseCredentials()
    {
        
    }

    public function getUserIdentifier()
    {
        
    }
}
