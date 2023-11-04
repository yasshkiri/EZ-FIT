<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     *Permert de savoir si cet publication est like par se utilisateur oui ou non si non matafichich jaime zar9a
     * @param User $user
     * @return boolean
     */

    public function JaimePar(User $user):bool{


        foreach ($this->postLikes as $like){
            if($like->getUser()===$user)return true;
        }
        return false;


    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @Assert\NotBlank
     */
    private $redacteurPub;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     * * @Assert\DateTime
     * @var string A "Y-m-d H:i:s" formatted value
     */
    private $datePub;

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
    private $contenu;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="publication", orphanRemoval=true)
     * @Assert\NotBlank
     */
    private $commentaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=PostLike::class, mappedBy="post")
     */
    private $yes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     *  @Assert\Range(
     *      min = 1,
     *      max = 5,)
     */
    private $note;



    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->yes = new ArrayCollection();

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRedacteurPub(): ?string
    {
        return $this->redacteurPub;
    }

    public function setRedacteurPub(string $redacteurPub): self
    {
        $this->redacteurPub = $redacteurPub;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(\DateTimeInterface $datePub): self
    {
        $this->datePub = $datePub;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setPublication($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPublication() === $this) {
                $commentaire->setPublication(null);
            }
        }

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

    /**
     * @return Collection<int, PostLike>
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(PostLike $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setPost($this);
        }

        return $this;
    }

    public function removeYe(PostLike $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getPost() === $this) {
                $ye->setPost(null);
            }
        }

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }





}
