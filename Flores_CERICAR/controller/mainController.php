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

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
