<article class="tile is-child notification is-primary">
	<p class="title">OS COMMAND INJECTION</p>
</article>
<form action="/PHPMVC/Vuln/OSCommandInjection" method="POST" style="margin-bottom: 20px; margin-top: 20px;">
	<input name="ip" class="input is-primary" type="text" style="width:50%" placeholder="Enter IP (ex: 192.168.1.1)">
	<button type="submit" class="button is-primary" name="Ping">PING</button>
</form>
<div class="ip">
	<?php 
	if(isset($data['ip'])) 
		echo '<pre style="border-radius: 10px;">'. $data['ip'] .'</pre>';
	?>
</div>

