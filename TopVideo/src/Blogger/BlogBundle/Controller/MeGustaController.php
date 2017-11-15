<?php
// src/Blogger/BlogBundle/Controller/MeGustaController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Form\MegustaType;
use Blogger\BlogBundle\Entity\MeGusta;


/**
 * Comment controller.
 */
class MeGustaController extends Controller
{

   public function createAction($video_id)
    {
        $video = $this->getVideo($video_id);

       
        $like = new MeGusta();
        $like->setVideo($video);
        
            $em = $this->getDoctrine()->getManager();
            $em->persist($like);
            $em->flush();

            return $this->redirect($this->generateUrl('blogger_blog_show', array('id' => $like->getVideo()->getId())) . '#Me Gusta-' . $like->getId());


            return $this->render('BloggerBlogBundle::show.html.twig', array('like' => $like));
    }

    protected function getVideo($video_id)
    {
        $em = $this->getDoctrine()->getManager();

        $video = $em->getRepository('BloggerBlogBundle:Video')->find($video_id);

        if (!$video) {
            throw $this->createNotFoundException('Unable to find Blog video');
        }

        return $video;
    }
}
?>
