<?php
// src/Blogger/BlogBundle/Controller/BlogController.php
namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

	public function listAction()
	{
		
	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();
	
	return $this->render('BloggerBlogBundle:Blog:list.html.twig', array('videos' => $videos));

	}

	public function showAction($id)
	{
		$video = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->find($id);
	
		if (!$video) {
					throw $this->createNotFoundException('No se ha encontrado el video.');
					}

		$comentarios = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Comentario')->getComentariosForVideo($video->getId());

		$categoria = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->find($video->getCategoria());

	

	return $this->render('BloggerBlogBundle:Blog:show.html.twig', array('video' => $video, 'comentarios' => $comentarios,'categoria' => $categoria ));
	}


	
	public function contactAction()
	{
	return $this->render('BloggerBlogBundle:Blog:contact.html.twig');
	}


public function InicioAction()
	{
		
	$categorias = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->getAllCategorias();

	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();


	
	return $this->render('BloggerBlogBundle:Blog:inicio.html.twig', array('categorias' => $categorias, 'videos' => $videos));


	}

	public function list_platAction()
	{
		
	$plats = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Plataforma')->getLatestPlats();
	
	return $this->render('BloggerBlogBundle:Blog:list_plataformas.html.twig', array('plats' => $plats));

	}

	public function show_catAction($id)
	{
		
	$categoria = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->find($id);
	
	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();


	
	return $this->render('BloggerBlogBundle:Blog:show_categoria.html.twig', array('categoria' => $categoria, 'videos' => $videos));

	}

}
?>
