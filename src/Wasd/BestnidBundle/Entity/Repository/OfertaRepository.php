<?php

namespace Wasd\BestnidBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OfertaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OfertaRepository extends EntityRepository
{
	public function findUsuarioRepetido($producto, $usuario){
		$em = $this->getEntityManager();
		$consulta = $em->createQuery('
			SELECT o FROM WasdBestnidBundle:Oferta o
			WHERE o.producto = :producto
			AND o.usuario = :usuario'
			);
		$consulta->setParameter('producto', $producto);
		$consulta->setParameter('usuario', $usuario);

		$consulta->setMaxResults(1);

		return $consulta->getResult();
	}
}
