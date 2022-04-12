<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\LessThan(propertyPath="date_fin_offre",message="check your date")
     */
    private $date_debut_offre;

    /**
     * @ORM\Column(type="date")
     * @Assert\GreaterThan(propertyPath="date_debut_offre",message="check your date")
     */
    private $date_fin_offre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pourcentage_promo;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     * })
     */
    private $id_article;

   
    public function __construct()
    {
        $this->id_article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutOffre(): ?\DateTimeInterface
    {
        return $this->date_debut_offre;
    }

    public function setDateDebutOffre(\DateTimeInterface $date_debut_offre): self
    {
        $this->date_debut_offre = $date_debut_offre;

        return $this;
    }

    public function getDateFinOffre(): ?\DateTimeInterface
    {
        return $this->date_fin_offre;
    }

    public function setDateFinOffre(\DateTimeInterface $date_fin_offre): self
    {
        $this->date_fin_offre = $date_fin_offre;

        return $this;
    }

    public function getPourcentagePromo(): ?string
    {
        return $this->pourcentage_promo;
    }

    public function setPourcentagePromo(string $pourcentage_promo): self
    {
        $this->pourcentage_promo = $pourcentage_promo;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getIdArticle(): Collection
    {
        return $this->id_article;
    }

    public function addIdArticle(Article $id_article): self
    {
        if (!$this->articles->contains($id_article)) {
            $this->articles[] = $id_article;
            $id_article->setOffre($this);
        }

        return $this;
    }

    public function removeIdArticle(Article $id_article): self
    {
        if ($this->article->removeElement($id_article)) {
            // set the owning side to null (unless already changed)
            if ($id_article->getOffre() === $this) {
                $id_article->setOffre(null);
            }
        }

        return $this;
    }

    public function setIdArticle(?Article $id_article): self
    {
        $this->id_article = $id_article;

        return $this;
    }
}
