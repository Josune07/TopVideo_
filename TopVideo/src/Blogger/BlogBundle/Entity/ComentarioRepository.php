<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ComentarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComentarioRepository extends EntityRepository
{

	public function getComentariosForVideo($videoId, $approved = true)
	{
		$qp = $this->createQueryBuilder('c')->select('c')->where('c.video = :video_id')->addOrderBy('c.created')->setParameter('video_id', $videoId);

		if (false === is_null($approved))
		$qp->andWhere('c.approved = :approved')->setParameter('approved', $approved);

		return $qp->getQuery()->getResult();
	}
}