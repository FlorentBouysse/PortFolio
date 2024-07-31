<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?bool $mastery = null;

    /**
     * @var Collection<int, SkillCategory>
     */
    #[ORM\ManyToMany(targetEntity: SkillCategory::class, inversedBy: 'skills')]
    private Collection $skill_category;

    public function __construct()
    {
        $this->skill_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function isMastery(): ?bool
    {
        return $this->mastery;
    }

    public function setMastery(bool $mastery): static
    {
        $this->mastery = $mastery;

        return $this;
    }

    /**
     * @return Collection<int, SkillCategory>
     */
    public function getSkillCategory(): Collection
    {
        return $this->skill_category;
    }

    public function addSkillCategory(SkillCategory $skillCategory): static
    {
        if (!$this->skill_category->contains($skillCategory)) {
            $this->skill_category->add($skillCategory);
        }

        return $this;
    }

    public function removeSkillCategory(SkillCategory $skillCategory): static
    {
        $this->skill_category->removeElement($skillCategory);

        return $this;
    }
}
