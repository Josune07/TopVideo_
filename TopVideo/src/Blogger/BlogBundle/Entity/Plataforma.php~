<?php
// src/Blogger/BlogBundle/Entity/Plataforma.php
namespace Blogger\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Blogger\BlogBundle\Entity\Plataforma
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\PlatafomaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Plataforma

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

    * @ORM\ManyToMany(targetEntity="Video", mappedBy="plataformas")

    */

    private $videos;


 /**
    * @ORM\Column(type="text")
    */
    protected $imagen;

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
     * @return Plataforma
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
     * Add videos
     *
     * @param \Blogger\BlogBundle\Entity\Video $videos
     * @return Plataforma
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

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Plataforma
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    public function getNumberofVideos()
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
