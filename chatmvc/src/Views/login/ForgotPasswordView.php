<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<title>Messagerie instantanee</title>
	<!-- BOOTSTRAP CORE STYLE  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- CUSTOM STYLE  -->
	<link href="../../css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="container">
		<div class="row pad-botm">
			<h4 class="header-line">Recuperation de mot de passe</h4>
		</div>

		<!--LOGIN PANEL START-->
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 offset-md-3">

				<form role="form" method="post" action="forgotpassword">
					<!-- TODO -->
					<div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name= "email" required />
                     </div>
                     <div class="form-group">
                        <label for="">Nouveau de Passe</label>
                        <input class="form-control" type="text" name= "password" required />
                     </div>
                     <div class="form-group">
                        <label for="">Confirmer le mot de passe</label>
                        <input class="form-control" type="text" name= "password2" required />
                     </div>
                     <button type="submit" name="signup" class="btn btn-danger">Envoyer</button>
					 <a href="/projet_gorille/chatmvc/login/loginIndex" class="btn btn-link">Login</a>
                
				</form>
			</div>

		</div>
		<!---LOGIN PABNEL END-->
	</div>
	<script>
		// Fonction de validation sans param�tre qui renvoie 
		// TRUE si les mots de passe saisis dans le formulaire sont identiques
		// FALSE sinon
		function valid() {
			//TODO
			if (document.forgotPassword.password.value != document.forgotPassword.password2.value) {
				alert("Les mot de passe ne correct pas!");
				return false;
			}
			return true;
		}
	</script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>