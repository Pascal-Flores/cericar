<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

	public static function superTest($request, $context) {
		$context->param1 = $context['param1'];
		$context->param2 = $context['param2'];

		return context::SUCCESS;
	}

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
