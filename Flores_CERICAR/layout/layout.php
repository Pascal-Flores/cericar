<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <title>
     Ton appli !
    </title>
   
  </head>

  <body>
    <h2>Super c'est ton appli ! </h2>
    <?php if($context->getSessionAttribute('user_id')): ?>
	<?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
     <?php endif; ?>

    <div id="page">
      <div id="page_maincontent">	
      	<?php 
          include($template_view);
        ?>
        <footer class='phpStatusBanner' style='width : 100%; position : absolute; bottom : 0; text-align : center;'>
          <?php 
            if ($context->{$action.'Errors'} != []) {
              foreach($context->{$action.'Errors'} as $error) {
                echo "<p>$error</p>";
              }
            }
            else {
              echo "Tout s'est bien passé :)))))";
            }
          ?>
        </footer>;
      </div>
    </div>
      

  </body>

</html>
