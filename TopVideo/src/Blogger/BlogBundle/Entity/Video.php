<?php
// src/Blogger/BlogBundle/Entity/Video.php
namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Blogger\BlogBundle\Entity\Video
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\VideoRepository")
 * @ORM\HasLifecycleCallbacks()
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
    * @ORM\Column(type="text")
    */
    protected $letra;


       /**

     * @ORM\OneToMany(targetEntity="Categoria", mappedBy="Video")

     */
     private $categoria;

      /**

     * @ORM\ManyToMany(targetEntity="Plataforma", inversedBy="Video")

     * @ORM\JoinTable(name="videos_plataforma")

     */
     private $plataforma;


    /**
 * @ORM\OneToMany(targetEntity="Comentario", mappedBy="video")
 */
    private $comentario;

    /**
 * @ORM\OneToMany(targetEntity="MeGusta", mappedBy="video")
 */
    private $megusta;






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

    /**
     * Set letra
     *
     * @param string $letra
     * @return Video
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;

        return $this;
    }

    /**
     * Get letra
     *
     * @return string 
     */
    public function getLetra($length =null)
    {
        
    if (false === is_null($length) && $length > 0 && strlen($this->letra) > $length)
        return substr($this->letra, 0, $length) . "(...)";
    else
        return $this->letra;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoria = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plataforma = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categoria
     *
     * @param \Blogger\BlogBundle\Entity\Categoria $categoria
     * @return Video
     */
    public function addCategorium(\Blogger\BlogBundle\Entity\Categoria $categoria)
    {
        $this->categoria[] = $categoria;

        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \Blogger\BlogBundle\Entity\Categoria $categoria
     */
    public function removeCategorium(\Blogger\BlogBundle\Entity\Categoria $categoria)
    {
        $this->categoria->removeElement($categoria);
    }

    /**
     * Get categoria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add plataforma
     *
     * @param \Blogger\BlogBundle\Entity\Plataforma $plataforma
     * @return Video
     */
    public function addPlataforma(\Blogger\BlogBundle\Entity\Plataforma $plataforma)
    {
        $this->plataforma[] = $plataforma;

        return $this;
    }

    /**
     * Remove plataforma
     *
     * @param \Blogger\BlogBundle\Entity\Plataforma $plataforma
     */
    public function removePlataforma(\Blogger\BlogBundle\Entity\Plataforma $plataforma)
    {
        $this->plataforma->removeElement($plataforma);
    }

    /**
     * Get plataforma
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlataforma()
    {
        return $this->plataforma;
    }

    /**
     * Add comentario
     *
     * @param \Blogger\BlogBundle\Entity\Comentario $comentario
     * @return Video
     */
    public function addComentario(\Blogger\BlogBundle\Entity\Comentario $comentario)
    {
        $this->comentario[] = $comentario;

        return $this;
    }

    /**
     * Remove comentario
     *
     * @param \Blogger\BlogBundle\Entity\Comentario $comentario
     */
    public function removeComentario(\Blogger\BlogBundle\Entity\Comentario $comentario)
    {
        $this->comentario->removeElement($comentario);
    }

    /**
     * Get comentario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Add megusta
     *
     * @param \Blogger\BlogBundle\Entity\Megusta $megusta
     * @return Video
     */
    public function addMegustum(\Blogger\BlogBundle\Entity\MeGusta $megusta)
    {
        $this->megusta[] = $megusta;

        return $this;
    }

    /**
     * Remove megusta
     *
     * @param \Blogger\BlogBundle\Entity\Megusta $megusta
     */
    public function removeMegustum(\Blogger\BlogBundle\Entity\MeGusta $megusta)
    {
        $this->megusta->removeElement($megusta);
    }

    /**
     * Get megusta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMegusta()
    {
        return $this->megusta;
    }
}
