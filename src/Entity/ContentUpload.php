<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentUploadRepository")
 */
class ContentUpload
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Content", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_content;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UploadedFile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_upload;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUpload(): ?UploadedFile
    {
        return $this->id_upload;
    }

    public function setIdUpload(UploadedFile $id_upload): self
    {
        $this->id_upload = $id_upload;

        return $this;
    }
}
