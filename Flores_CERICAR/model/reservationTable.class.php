<?php
// Inclusion de la classe utilisateur

use Doctrine\ORM\NoResultException;

require_once "reservation.class.php";

class reservationTable {

  public static function getReservationByVoyage($voyage)
	{
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$reservationRepository = $em->getRepository('reservation');
	$reservations = $reservationRepository->findBy(array('voyage' => $voyage->id));	
	
	if (!$reservations)
		throw new NoResultException();
			   
	return $reservations; 
	}

  
}


?>
