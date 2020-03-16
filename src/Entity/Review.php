<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
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
    private $id_reviewer;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Content", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReviewer(): ?User
    {
        return $this->id_reviewer;
    }

    public function setIdReviewer(User $id_reviewer): self
    {
        $this->id_reviewer = $id_reviewer;

        return $this;
    }

    public function getIdContent(): ?Content
    {
        return $this->id_content;
    }

    public function setIdContent(Content $id_content): self
    {
        $this->id_content = $id_content;

        return $this;
    }
}
