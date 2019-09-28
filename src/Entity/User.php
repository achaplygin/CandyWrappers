<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
    public const ROLE_USER = 'ROLE_USER';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     * @Assert\Email(message = "The email '{{ value }}' is not a valid.")
     * @ORM\Column(type="string", length=180, unique=true, nullable=true)
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     * @var string
     */
    private $plainPassword;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stuff", mappedBy="user_id", orphanRemoval=true)
     */
    private $stuffs;

    /** @ORM\Column(type="string", nullable=true) */
    private $emailConfirm;

    public function __construct()
    {
        $this->stuffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): string
    {
        return (string)$this->username;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = self::ROLE_USER;

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): string
    {
        return (string)$this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return Collection|Stuff[]
     */
    public function getStuffs(): Collection
    {
        return $this->stuffs;
    }

    public function addStuff(Stuff $stuff): self
    {
        if (!$this->stuffs->contains($stuff)) {
            $this->stuffs[] = $stuff;
            $stuff->setUserId($this);
        }

        return $this;
    }

    public function removeStuff(Stuff $stuff): self
    {
        if ($this->stuffs->contains($stuff)) {
            $this->stuffs->removeElement($stuff);
            // set the owning side to null (unless already changed)
            if ($stuff->getUserId() === $this) {
                $stuff->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailConfirm(): ?string
    {
        return $this->emailConfirm;
    }

    /**
     * @param mixed $emailConfirm
     */
    public function setEmailConfirm($emailConfirm): void
    {
        $this->emailConfirm = $emailConfirm;
    }
}
