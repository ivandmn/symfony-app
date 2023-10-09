<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`users`')]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'username', type: 'string', length: 255, unique: true, nullable: false)]
    private ?string $username = null;

    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true, nullable: false)]
    private ?string $email = null;

    /**
     * @var string|null The hashed password
     */
    #[ORM\Column(name: 'password', type: 'string', nullable: false)]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = ['ROLE_USER'];

    #[ORM\Column(name: 'name', type: 'string', length: 255, unique: true, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(name: 'last_name', type: 'string', length: 255, unique: true, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(name: 'mobile', type: 'string', length: 20, unique: true, nullable: true)]
    private ?string $mobile = null;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: true)]
    private ?DateTime $createdAt = null;

    #[ORM\Column(name: 'last_login', type: 'datetime', nullable: true)]
    private ?DateTime $lastLogin = null;

    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUsername() : ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username) : static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier() : string
    {
        return (string) $this->username;
    }

    /**
     * @return string|null
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return void
     */
    public function setEmail(?string $email) : void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword() : ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password) : static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles() : array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array $roles
     *
     * @return $this
     */
    public function setRoles(array $roles) : static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name) : static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return $this
     */
    public function setLastName(?string $lastName) : static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMobile() : ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     *
     * @return $this
     */
    public function setMobile(?string $mobile) : static
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt() : ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(?DateTime $createdAt) : static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastLogin() : ?DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime|null $lastLogin
     *
     * @return $this
     */
    public function setLastLogin(?DateTime $lastLogin) : static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials() : void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
