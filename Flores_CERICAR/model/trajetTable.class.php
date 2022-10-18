<?php
// Inclusion de la classe utilisateur

use Doctrine\ORM\NoResultException;

require_once "trajet.class.php";

class trajetTable {

  public static function getTrajet($depart, $arrivee)
	{
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$trajetRepository = $em->getRepository('trajet');
	$trajet = $trajetRepository->findOneBy(array('depart' => $depart, 'arrivee' => $arrivee));	
	
	if (!$trajet)
		throw new NoResultException();
			   
	return $trajet; 
	}

  
}


?>
