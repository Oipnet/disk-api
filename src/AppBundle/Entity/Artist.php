<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Artist
 *
 * @ApiResource
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtistRepository")
 */
class Artist
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Disk", mappedBy="artist", cascade={"persist", "remove"})
     */
    private $disks;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add disk
     *
     * @param \AppBundle\Entity\Disk $disk
     *
     * @return Artist
     */
    public function addDisk(\AppBundle\Entity\Disk $disk)
    {
        $this->disks[] = $disk;

        return $this;
    }

    /**
     * Remove disk
     *
     * @param \AppBundle\Entity\Disk $disk
     */
    public function removeDisk(\AppBundle\Entity\Disk $disk)
    {
        $this->disks->removeElement($disk);
    }

    /**
     * Get disks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisks()
    {
        return $this->disks;
    }
}
