<?php

namespace App\Domain\Blog\Entity;

use App\Domain\Blog\Repository\TaxonomyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaxonomyRepository::class)
 */
class Taxonomy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, mappedBy="taxonomies")
     */
    private $articles;

    /**
     * @ORM\ManyToMany(targetEntity=Taxonomy::class, inversedBy="taxonomies")
     */
    private $relatedTaxonomies;


    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->relatedTaxonomies = new ArrayCollection();
        $this->taxonomies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->addTaxonomy($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removeTaxonomy($this);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRelatedTaxonomies(): Collection
    {
        return $this->relatedTaxonomies;
    }

    public function addRelatedTaxonomy(self $republiclatedTaxonomy): self
    {
        if (!$this->relatedTaxonomies->contains($relatedTaxonomy)) {
            $this->relatedTaxonomies[] = $relatedTaxonomy;
        }

        return $this;
    }

    public function removeRelatedTaxonomy(self $relatedTaxonomy): self
    {
        $this->relatedTaxonomies->removeElement($relatedTaxonomy);

        return $this;
    }
}
