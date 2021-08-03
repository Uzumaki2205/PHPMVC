<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
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
	<section class="hero is-primary">
		<div class="hero-body">
			<p class="title">
				Admin Page
			</p>
			<p class="subtitle">
				TASK 5 <strong>Level 3</strong> on Trello
			</p>
		</div>
	</section>

	<div class="columns" style="margin: 20px">
		<div class="column is-one-quarter">
			<div class="card">
				<div class="card-content">
					<div class="content">
						<ul class="menu-list" style="list-style: none; padding-left: 0">
							<li>All Functions</li>
							<li>
								<a class="is-active">Quizz</a>
								<ul>
									<li><a href="/PHPMVC/Admin/AllQuestion">All Question</a></li>
									<li><a href="/PHPMVC/Admin/CreateQuestion">Create Question</a></li>
									<li><a href="/PHPMVC/Admin/Reports">Report</a></li>
								</ul>
							</li>
							<li>
								<a class="is-active">Vulnerabilities</a>
								<ul>
									<li><a href="/PHPMVC/Question/Quizz">XSS</a></li>
									<li><a href="/PHPMVC/Vuln/OSCommandInjection">OS Command Injection</a></li>
									<li><a href="/PHPMVC/Vuln/PathTraversal">Path Traversal</a></li>
								</ul>
							</li>
							<li>
								<a class="is-active">Info</a>
								<ul>
									<li><a>Admin</a></li>
									<li><a href="/PHPMVC/Account/Logout">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>	
		</div>
		<div class="column is-three-quarters">
			



