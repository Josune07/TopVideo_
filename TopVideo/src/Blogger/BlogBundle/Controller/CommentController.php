<?php
// src/Blogger/BlogBundle/Controller/CommentController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Form\CommentType;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    public function newAction($video_id)
    {
        $video = $this->getVideo($video_id);

        $comentario = new Comment();
        $comentario->setVideo($video);
        $form   = $this->createForm(new CommentType(), $comentario);

        return $this->render('BloggerBlogBundle:Comment:form.html.twig', array('comentario' => $comentario,'form'   => $form->createView()));
    }

    public function createAction($video_id)
    {
        $video = $this->getVideo($video_id);

        $comentario  = new Comment();
        $comentario->setVideo($video);
        $request = $this->getRequest();
        $form = $this->createForm(new CommentType(), $comentario);
        $form->bind($request);

         if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirect($this->generateUrl('blogger_blog_show', array('id' => $comentario->getPost()->getId())) . '#comentario-' . $comentario->getId());
        }
        return $this->render('BloggerBlogBundle:Comment:create.html.twig', array('comentario' => $comentario, 'form' => $form->createView()));
    }

    protected function getVideo($video_id)
    {
        $em = $this->getDoctrine()->getManager();

        $video = $em->getRepository('BloggerBlogBundle:Post')->find($vide_id);

        if (!$video) {
            throw $this->createNotFoundException('Unable to find Blog video.');
        }

        return $video;
    }
}
?>
