<?php

//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);

// constants definitions
$appName = "Flores_CERICAR";

// dependencies inclusion|requirements 
require_once "lib/core.php";
require_once "$appName/controller/mainController.php";
foreach(glob("$appName/model/*.class.php") as $includedModel)
	include_once $includedModel; 

// determination of the action to process
if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];
else 
	$action = "index";

session_start();

$context = context::getInstance();
$context->init($appName);

$view = $context->executeAction($action, $_REQUEST);
//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view === false)
{
	echo "Error : action $action does not exist";
	die;
}
elseif($view == context::ERROR) {
	$template_view = "$appName/view/$action$view.php";
	include("$appName/layout/{$context->getLayout()}.php");
}
//inclusion du layout qui va lui meme inclure le template view
elseif($view != context::NONE)
{
	$template_view = "$appName/view/$action$view.php";
	include("$appName/layout/{$context->getLayout()}.php");
}

else 
	echo "Error : something went wrong";
?>
