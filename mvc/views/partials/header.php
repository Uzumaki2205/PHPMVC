<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>
	<nav class="navbar is-info" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="https://bulma.io">
				<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
			</a>

			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

		<div class="navbar-menu">
			<div class="navbar-start">
				<a class="navbar-item" href="/PHPMVC">
					Home
				</a>

				<a class="navbar-item">
					Documentation
				</a>
			</div>

			<div class="navbar-end">
				
				<?php
				if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
					?>
					<div class="navbar-item">
						<div class="buttons">
							<a class="button is-primary" href="/PHPMVC/Account/Register">
								<strong>Sign up</strong>
							</a>
							<a class="button is-light" href="/PHPMVC/Account/Login">
								Log in
							</a>
						</div>
					</div>
					
				<?php } else { ?>
					<div class="navbar-item">
						<div class="navbar-item has-dropdown is-hoverable">
							<a class="navbar-link" style="background-color: transparent;">
								<?php echo $_SESSION['username'] ?>
							</a>

							<div class="navbar-dropdown is-right">
								<a class="navbar-item" href="/PHPMVC/Question/Quizz">
									Quizz
								</a>
								<a class="navbar-item" href="/PHPMVC/Vuln/OSCommandInjection">
									OS Command Injection
								</a>
								<a class="navbar-item" href="/PHPMVC/Vuln/PathTraversal">
									Path Traversal
								</a>
								<hr class="navbar-divider">
								<div class="navbar-item">
									<a href="/PHPMVC/Account/Logout">Logout</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>