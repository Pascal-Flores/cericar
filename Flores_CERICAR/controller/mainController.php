<?php

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

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
