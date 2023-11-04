<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     * * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @Assert\NotBlank
     */
    private $redacteurRec;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     * * @Assert\DateTime
     * @var string A "H:i:s \O\n d/m/Y" formatted value
     */
    private $dateRec;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Assert\Length(
     *      min = 1,
     *      max = 20,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @Assert\NotBlank
     */
    private $contenuRec;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRedacteurRec(): ?string
    {
        return $this->redacteurRec;
    }

    public function setRedacteurRec(string $redacteurRec): self
    {
        $this->redacteurRec = $redacteurRec;

        return $this;
    }

    public function getDateRec(): ?\DateTimeInterface
    {
        return $this->dateRec;
    }

    public function setDateRec(\DateTimeInterface $dateRec): self
    {
        $this->dateRec = $dateRec;

        return $this;
    }

    public function getContenuRec(): ?string
    {
        return $this->contenuRec;
    }

    public function setContenuRec(string $contenuRec): self
    {
        $this->contenuRec = $contenuRec;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
