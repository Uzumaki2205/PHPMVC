<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

require_once('mvc/Middleware.php');

if(isset($_SESSION['type']) && $_SESSION['type']=='admin') 
{ 
	require_once('mvc/views/admin/partials/sidebar.php');
} 
else {
	require_once('mvc/views/partials/header.php');
} 
?>

<div class="container mt-4 mb-4">
	<?php $myApp = new App(); ?>
</div>

<?php
if(isset($_SESSION['type']) && $_SESSION['type']=='admin')
{ 
	require_once('mvc/views/admin/partials/footer.php');
} 
?>