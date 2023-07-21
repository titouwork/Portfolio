<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $language = null;

    #[ORM\ManyToMany(targetEntity: Projects::class, inversedBy: 'tags')]
    private Collection $projectsTags;

    public function __construct()
    {
        $this->projectsTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection<int, Projects>
     */
    public function getProjectsTags(): Collection
    {
        return $this->projectsTags;
    }

    public function addProjectsTag(Projects $projectsTag): self
    {
        if (!$this->projectsTags->contains($projectsTag)) {
            $this->projectsTags->add($projectsTag);
        }

        return $this;
    }

    public function removeProjectsTag(Projects $projectsTag): self
    {
        $this->projectsTags->removeElement($projectsTag);

        return $this;
    }
}
