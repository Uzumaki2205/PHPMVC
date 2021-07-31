
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['email']))
?>

<div class="tile">
	<div class="tile is-parent is-vertical">
		<article class="tile is-child notification is-primary">
			<p class="title">Login to quizz</p>
			<p class="subtitle">
				<a style="text-decoration: none;" href="/PHPMVC/Account/Login"><button class="button is-link mt-4">Login</button></a>
			</p>
		</article>
	</div>
</div>	
