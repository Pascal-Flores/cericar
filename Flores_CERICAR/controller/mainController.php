<?php

use Doctrine\ORM\NoResultException;

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

	public static function superTest($request, $context) {
		$errors = [];
		if ($request['param1']) 
			$context->param1 = $request['param1'];
		else
			array_push($errors, 'Warning : param1 is missing :(');

		if($request['param2'])
			$context->param2 = $request['param2'];
		else {
			array_push($errors, 'Warning : param2 is missing :(');
		}
		$context->superTestErrors = $errors;
		return context::SUCCESS;
	}

	public static function testTrajet($request, $context) {
		$errors = [];

		if($request['depart'] && $request['arrivee']) {
			try {
				$trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
			}
			catch (NoResultException $e){
				array_push($errors, "Il n'y a pas de trajet correspondant à vos critères. C'est triste.");
				$context->testTrajetErrors = $errors;
				return context::ERROR;
			}

			$context->foundTrajet = $trajet;
		}
		else {
			array_push($errors, "L'arrivée ou le départ n'a pas été renseigné. Faites attention a l'avenir, c'est un peu cringe de déranger le serveur pour ça, il a déja assez de choses à gérer comme ça.");
			$context->testTrajetErrors = $errors;
			return context::ERROR;
		}

		$context->testTrajetErrors = $errors;

		return context::SUCCESS;
	}

	public static function testVoyage($request, $context) {
		$errors = [];

		if($request['depart'] && $request['arrivee']) {
			try {
				$trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
			}
			catch (NoResultException $e){
				array_push($errors, "Il n'y a pas de trajet correspondant à vos critères. C'est triste.");
				$context->testTrajetErrors = $errors;
				return context::ERROR;
			}

			try {
				$voyages = voyageTable::getVoyagesByTrajet($trajet);
			}
			catch (NoResultException $e){
				array_push($errors, "Il n'y a pas de voyages associés au trajet demandé. Dommage pour vous :/");
				$context->testVoyageErrors = $errors;
				return context::ERROR;
			}
			$context->foundVoyages = $voyages;
		}
		else {
			array_push($errors, "L'arrivée ou le départ n'a pas été renseigné. Faites attention a l'avenir, c'est un peu cringe de déranger le serveur pour ça, il a déja assez de choses à gérer comme ça.");
			$context->testTrajetErrors = $errors;
			return context::ERROR;
		}

		$context->testTrajetErrors = $errors;

		return context::SUCCESS;
	}

	public static function testReservation($request, $context) {
		$errors = [];

		if($request['depart'] && $request['arrivee']) {
			try {
				$reservations = reservationTable::getReservationByVoyage(
					voyageTable::getVoyagesByTrajet(
						trajetTable::getTrajet($request['depart'], $request['arrivee'])
					)[0]
				);
			}
			catch (NoResultException $e){
				array_push($errors, "Chépa mais ça marche pas");
				$context->testReservationErrors = $errors;
				return context::ERROR;
			}
			$context->foundReservations = $reservations;
		}
		else {
			array_push($errors, "L'arrivée ou le départ n'a pas été renseigné. Faites attention a l'avenir, c'est un peu cringe de déranger le serveur pour ça, il a déja assez de choses à gérer comme ça.");
			$context->testTrajetErrors = $errors;
			return context::ERROR;
		}

		$context->testTrajetErrors = $errors;

		return context::SUCCESS;
	}

	public static function testUser($request, $context) {
		$errors = [];

		if($request['login'] && $request['password']) {
			try {
				$utilisateur = utilisateurTable::getUserByLoginAndPass($request['login'], $request['password']);
			}
			catch(NoResultException $e) {
				array_push($errors, "cet utilisateur n'existe pas / login/mdp incorrect");
				$context->testUserErrors = $errors;
				return context::ERROR;
			}

			$context->foundUser = $utilisateur;

		}
		else if ($request['login']) {
			try {
				$utilisateur = utilisateurTable::getUserById($request['login']);
			}
			catch(NoResultException $e) {
				array_push($errors, "cet utilisateur n'existe pas");
				$context->testUserErrors = $errors;
				return context::ERROR;
			}

			$context->foundUser = $utilisateur;
		}
		else {
			array_push($errors , "Le mdp n'a pas été renseigné. C'est malheureux mais ça arrive...");
			$context->testUserErrors = $errors;
			return context::ERROR;
		}

		return context::SUCCESS;
	}

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
