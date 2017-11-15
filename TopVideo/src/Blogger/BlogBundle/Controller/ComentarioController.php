<?php
// src/Blogger/BlogBundle/Controller/ComentarioController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Comentario;
use Blogger\BlogBundle\Form\ComentarioType;

/**
 * Comentario controller.
 */
class ComentarioController extends Controller
{
    public function newAction($video_id)
    {
        $video = $this->getVideo($video_id);

        $comentario = new Comentario();
        $comentario->setVideo($video);
        $form   = $this->createForm(new ComentarioType(), $comentario);

        return $this->render('BloggerBlogBundle:Comentario:form.html.twig', array('comentario' => $comentario,'form'   => $form->createView()));
    }

    public function createAction($video_id)
    {
        $video = $this->getVideo($video_id);

        $comentario  = new Comentario();
        $comentario->setVideo($video);
        $request = $this->getRequest();
        $form = $this->createForm(new ComentarioType(), $comentario);
        $form->bind($request);

                if ($form->isValid()) 
                {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($comentario);
                    $em->flush();

                    return $this->redirect($this->generateUrl('blogger_blog_show', array('id' => $comentario->getVideo()->getId())) . '#comentario-' . $comentario->getId());
                }

         return $this->render('BloggerBlogBundle:Comentario:create.html.twig', array('comentario' => $comentario, 'form' => $form->createView()));
   }

    protected function getVideo($video_id)
    {
        $em = $this->getDoctrine()->getManager();

        $video = $em->getRepository('BloggerBlogBundle:Video')->find($video_id);

        if (!$video) {
            throw $this->createNotFoundException('Unable to find Blog video.');
        }

        return $video;
    }
}
?>
