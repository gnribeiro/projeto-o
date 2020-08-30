<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
	<head profile="http://gmpg.org/xfn/11">
		<title>Login</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link  rel="stylesheet" type="text/css" href="/static/css/login.css"	media="all" />
	</head>

	<body>


		<div class="login">
			<div class="login_content">
<?php // if( Request::user_agent('browser')==='Chrome'){ ?>
				<h1>Login</h1> 
			 
				<form method="post" action="">
					<span class="error">

					<?php foreach ($error as $value):?>
						<?php echo $value ?> <br />
					<?php endforeach ?>

					</span> 
					<label>	User:</label>
	 
					<input type="text" name="username" />

					<label>Passwword:</label>

					<input type="password"  name="password" />

					<input type="submit" class="button" value="login"/>
				</form>
<?php // } else {?>

O seu gestor de conteudo da sua aplicação online , esta optimadizada para funcionar no broswer Chrome ,
<br/>

<? // } ?>
			</div>

			<div class="login_bottom"></div>
		</div>
	</body>
</html>
