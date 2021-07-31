<div class="columns is-multiline is-mobile">
	<div class="column is-one-quarter"></div>
	<div class="column is-half">
		<form class="card" method="POST" action="Login">
			<div class="card-content" style="margin-top: 50px;">
				<div class="content">
					<?php if (isset($data['alert'])) 
						echo '<div class="field">
						<div class="alert alert-primary" role="alert">' . $data['alert'] .'</div></div>'
					?>
					<div class="field">
						<p class="control has-icons-left has-icons-right">
							<input class="input" type="text" placeholder="Enter username" name="username">
							<span class="icon is-small is-left">
								<i class="fas fa-user"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fas fa-check"></i>
							</span>
						</p>
					</div>
					<div class="field">
						<p class="control has-icons-left">
							<input class="input" type="password" placeholder="Password" name="password">
							<span class="icon is-small is-left">
								<i class="fas fa-lock"></i>
							</span>
						</p>
					</div>
					<div class="field is-grouped is-grouped-right">
						<p class="control">
							<button type="submit" class="button is-primary">
								Login
							</button>
						</p>
						<p class="control">
							<a href="register" class="button is-light">
								Register
							</a>
						</p>
					</div>
				</div>
			</div>
		</form>
		<div class="column is-one-quarter"></div>
	</div>