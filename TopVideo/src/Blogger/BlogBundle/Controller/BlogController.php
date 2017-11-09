<?php
// src/Blogger/BlogBundle/Controller/BlogController.php
namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

	public function listAction()
	{
		$videos = $this->get('doctrine')->getManager()->createQuery('SELECT v FROM BloggerBlogBundle:Video v')->execute();

		return $this->render('BloggerBlogBundle:Blog:list.html.twig', array('videos' => $videos));
	}

	public function showAction($id)
	{
		$video = $this->get('doctrine')->getManager()->getRepository('BloggerBlogBundle:Video')->find($id);
		if (!$video)
		{
			// cause the 404 page not found to be displayed
			throw $this->createNotFoundException();
		}
		
		return $this->render('BloggerBlogBundle:Blog:show.html.twig', array('video' => $video));
	}
}
?>
