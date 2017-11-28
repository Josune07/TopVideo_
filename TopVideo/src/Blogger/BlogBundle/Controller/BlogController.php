<?php
// src/Blogger/BlogBundle/Controller/BlogController.php
namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

	public function listAction()
	{
		
	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();
	$plataformas = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Plataforma')->getLatestPlats();
	$likes = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMostLikedVideos();
	return $this->render('BloggerBlogBundle:Blog:list.html.twig', array('videos' => $videos,'plataformas' => $plataformas,'likes' => $likes ));
	
	

	}

	public function showAction($id)
	{
		$video = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->find($id);
		$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();
		if (!$video) {
					throw $this->createNotFoundException('No se ha encontrado el video.');
					}

		$comentarios = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Comentario')->getComentariosForVideo($video->getId());

		$categoria = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->find($video->getCategoria());
		$megusta = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMeGustasForVideo($video->getId());
		$likes = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMostLikedVideos();
	

	return $this->render('BloggerBlogBundle:Blog:show.html.twig', array('video' => $video, 'comentarios' => $comentarios,'categoria' => $categoria, 'megusta' => $megusta ,'likes' => $likes,'videos' => $videos ));
	}


	
	public function contactAction()
	{
	return $this->render('BloggerBlogBundle:Blog:contact.html.twig');
	}


public function InicioAction()
	{
		
	$categorias = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->getAllCategorias();

	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();

	$likes = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMostLikedVideos();
	
	return $this->render('BloggerBlogBundle:Blog:inicio.html.twig', array('categorias' => $categorias, 'videos' => $videos,'likes' => $likes));


	}

	public function list_platAction()
	{
		
	$plats = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Plataforma')->getLatestPlats();
	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();
	$likes = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMostLikedVideos();

	return $this->render('BloggerBlogBundle:Blog:list_plataformas.html.twig', array('plats' => $plats, 'videos'=> $videos,'likes' => $likes));

	}

	public function show_catAction($id)
	{
		
	$categoria = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->find($id);
	
	$videos = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->getLatestVideos();
	$likes = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:MeGusta')->getMostLikedVideos();

	
	return $this->render('BloggerBlogBundle:Blog:show_categoria.html.twig', array('categoria' => $categoria, 'videos' => $videos,'likes' => $likes));

	}


	public function show_ajaxAction($id)
	{
		$video = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->find($id);
		

	return $this->render('BloggerBlogBundle:Blog:show_ajax.html.twig', array('video' => $video));
	}

	public function show_cat_ajaxAction($id)
	{
		$categoria = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Categoria')->find($id);
		

	return $this->render('BloggerBlogBundle:Blog:show_cat_ajax.html.twig', array('categoria' => $categoria));
	}


	
}
?>
