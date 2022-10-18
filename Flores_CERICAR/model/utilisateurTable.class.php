<?php
// Inclusion de la classe utilisateur

use Doctrine\ORM\NoResultException;

require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass)
	{
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
	
	if ($user == false){
		throw new NoResultException();
			   }
	return $user; 
	}

  
}


?>
