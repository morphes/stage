<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HallRepository")
 */
class Hall
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Seat", mappedBy="hall")
     */
    private $seats;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Seat", inversedBy="halls")
     */
    private $tests;

    /**
     * @ORM\Column(type="array")
     */
    private $tests1 = [];

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $tests2;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $tests3 = [];

    public function __construct()
    {
        $this->seats = new ArrayCollection();
        $this->tests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Seat[]
     */
    public function getSeats(): Collection
    {
        return $this->seats;
    }

    public function addSeat(Seat $seat): self
    {
        if (!$this->seats->contains($seat)) {
            $this->seats[] = $seat;
            $seat->setHall($this);
        }

        return $this;
    }

    public function removeSeat(Seat $seat): self
    {
        if ($this->seats->contains($seat)) {
            $this->seats->removeElement($seat);
            // set the owning side to null (unless already changed)
            if ($seat->getHall() === $this) {
                $seat->setHall(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Seat[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Seat $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
        }

        return $this;
    }

    public function removeTest(Seat $test): self
    {
        if ($this->tests->contains($test)) {
            $this->tests->removeElement($test);
        }

        return $this;
    }

    public function getTests1(): ?array
    {
        return $this->tests1;
    }

    public function setTests1(array $tests1): self
    {
        $this->tests1 = $tests1;

        return $this;
    }

    public function getTests2()
    {
        return $this->tests2;
    }

    public function setTests2($tests2): self
    {
        $this->tests2 = $tests2;

        return $this;
    }

    public function getTests3(): ?array
    {
        return $this->tests3;
    }

    public function setTests3(?array $tests3): self
    {
        $this->tests3 = $tests3;

        return $this;
    }
}
