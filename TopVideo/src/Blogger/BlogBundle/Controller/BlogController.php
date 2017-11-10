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

	

	return $this->render('BloggerBlogBundle:Blog:show.html.twig', array('video' => $video, 'comentarios' => $comentarios));
	}


	
	public function contactAction()
	{
	return $this->render('BloggerBlogBundle:Blog:contact.html.twig');
	}

}
?>
