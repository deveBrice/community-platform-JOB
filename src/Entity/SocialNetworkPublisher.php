<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocialNetworkPublisherRepository")
 */
class SocialNetworkPublisher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SocialNetwork", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_social_network;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdSocialNetwork(): ?SocialNetwork
    {
        return $this->id_social_network;
    }

    public function setIdSocialNetwork(SocialNetwork $id_social_network): self
    {
        $this->id_social_network = $id_social_network;

        return $this;
    }
}
