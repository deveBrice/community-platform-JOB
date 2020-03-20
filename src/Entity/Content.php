<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 */
class Content
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="content", cascade={"persist", "remove"})
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContentUpload", mappedBy="id_content", orphanRemoval=true)
     */
    private $contentUploads;

    public function __construct()
    {
        $this->contentUploads = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state) : self
    {
        $this->state = $state;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return Collection|ContentUpload[]
     */
    public function getContentUploads(): Collection
    {
        return $this->contentUploads;
    }

    public function addContentUpload(ContentUpload $contentUpload): self
    {
        if (!$this->contentUploads->contains($contentUpload)) {
            $this->contentUploads[] = $contentUpload;
            $contentUpload->setIdContent($this);
        }

        return $this;
    }

    public function removeContentUpload(ContentUpload $contentUpload): self
    {
        if ($this->contentUploads->contains($contentUpload)) {
            $this->contentUploads->removeElement($contentUpload);
            // set the owning side to null (unless already changed)
            if ($contentUpload->getIdContent() === $this) {
                $contentUpload->setIdContent(null);
            }
        }

        return $this;
    }
}
