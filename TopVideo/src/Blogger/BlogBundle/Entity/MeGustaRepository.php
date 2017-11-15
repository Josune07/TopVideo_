<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MeGustaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MeGustaRepository extends EntityRepository
{

public function getMeGustasForVideo($videoId)
	{
		$qp = $this->createQueryBuilder('m')->select('count(m.id)')->where('m.video = :video_id')->setParameter('video_id', $videoId);

		return $qp->getQuery()->getSingleScalarResult();
	}

}
