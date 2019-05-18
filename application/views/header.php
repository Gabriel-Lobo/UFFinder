<div class='navbar'>
	<a class='logo' href='index.php'></a>
	<form id='login_form' enctype='application/x-www-form-urlencoded' action='login.php' method='post'>
		<?php
			if (!empty($_GET['logged']) && $_GET['logged'] == 'true') {
				echo "<a class='link' href='profile.php'>" . $_GET['email'] . "</a>
							<input class='button' type='submit' value='Sair' />
							<input type='hidden' name='status' value='logout' />";
			} else {		
				echo "<label for='email'>Email:</label>
							<input class='form' type='email' name='email' placeholder='email@id.uff.br' minlength='3' maxlength='150' required />
							<label for='password'>Senha:</label>
							<input class='form' type='password' name='password' minlength='3' maxlength='150' required />
							<input class='button' type='submit' value='Entrar' />
							<a class='button' href='signup.php'>Cadastrar</a>
							<input type='hidden' name='status' value='login' />";
			}
		?>
	</form>
</div>
