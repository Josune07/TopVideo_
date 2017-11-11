<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * Blogger\BlogBundle\Entity\MeGusta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\MeGustaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MeGusta
{
    //Listamos los atributos
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="megusta")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     */
    private $video;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set video
     *
     * @param \Blogger\BlogBundle\Entity\Video $video
     * @return MeGusta
     */
    public function setVideo(\Blogger\BlogBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Blogger\BlogBundle\Entity\Video 
     */
    public function getVideo()
    {
        return $this->video;
    }
}
