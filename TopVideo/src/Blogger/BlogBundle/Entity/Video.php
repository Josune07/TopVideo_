<?php
// src/Blogger/BlogBundle/Entity/Video.php
namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="video")
*/

class Video
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
	protected $titulo;

	/**
	* @ORM\Column(type="text")
	*/
	protected $cantante;
	
	/**
	* @ORM\Column(type="date")
	*/
	protected $date;

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
     * Set titulo
     *
     * @param string $titulo
     * @return Video
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set cantante
     *
     * @param string $cantante
     * @return Video
     */
    public function setCantante($cantante)
    {
        $this->cantante = $cantante;

        return $this;
    }

    /**
     * Get cantante
     *
     * @return string 
     */
    public function getCantante()
    {
        return $this->cantante;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Video
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
