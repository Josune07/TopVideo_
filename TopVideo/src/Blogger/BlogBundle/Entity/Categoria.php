<?php
// src/Blogger/BlogBundle/Entity/Categoria.php
namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Blogger\BlogBundle\Entity\Categoria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\CategoriaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Categoria
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */

    protected $id;

    /**
    * @ORM\Column(type="text")
    */
    protected $nombre;


    /**
 * @ORM\OneToMany(targetEntity="Video", mappedBy="categoria")
 */
    protected $videos;


   
    /**
     * Get id
     *
     * @return integer 
     */
       /**
     * Constructor
     */
    public function __construct()
    {
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set num_videos
     *
     * @param integer $numVideos
     * @return Categoria
     */
    public function setNumVideos($numVideos)
    {
        $this->num_videos = $numVideos;

        return $this;
    }

    /**
     * Get num_videos
     *
     * @return integer 
     */
    public function getNumVideos()
    {
        return $this->num_videos;
    }

    /**
     * Add videos
     *
     * @param \Blogger\BlogBundle\Entity\Video $videos
     * @return Categoria
     */
    public function addVideo(\Blogger\BlogBundle\Entity\Video $videos)
    {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \Blogger\BlogBundle\Entity\Video $videos
     */
    public function removeVideo(\Blogger\BlogBundle\Entity\Video $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos()
    {
        return $this->videos;
    }

    public function getNumOfVideos()
    {

    $videos = new ArrayCollection;
    $videos= $this-> getVideos();
    return count($videos);

    }



     public function __toString()
    {
        return $this->getNombre();
    }
}
