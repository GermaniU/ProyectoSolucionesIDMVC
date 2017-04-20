<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<link rel="stylesheet" type="text/css" href="views/assets/css/style.css">

</head>

<body>

 <div class="container">
 	<div id="navbar">
 		<?php include "modules/navegacion.php"; ?>
 	</div>
 </div>

<section>

<?php 

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>
	
</body>

</html>