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
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-line">Créer un compte</h4>
            </div>
        </div>

        <!-- On appelle la fonction valid() dans la balise <form> onSubmit="return valid(); -->
        <!-- On appelle la fonction checkAvailability() dans la balise <input> de l'email onBlur="checkAvailability(this.value)" -->
        
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3">
                <form name="signup" method="post" action="/projet_gorille/chatmvc/login/signup" onSubmit="return valid();">
                    <!-- TODO -->
                     <div class="form-group">
                        <label for="">Pseudo</label>
                        <input class="form-control" type="text" name= "pseudo" required />
                     </div>
                     <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name= "email" required />
                     </div>
                     <div class="form-group">
                        <label for="">Mot de Passe</label>
                        <input class="form-control" type="password" name= "password" required />
                     </div>
                     <div class="form-group">
                        <label for="">Confirmer le mot de passe</label>
                        <input class="form-control" type="password" name= "password2" required />
                     </div>
                     <button type="submit" name="signup" class="btn btn-danger">Enregistrer</button>

                     
                </form>
            </div>
        </div>
    </div>


    <script>
        // Fonction de validation sans paramètre qui renvoie 
        // TRUE si les mots de passe saisis dans le formulaire sont identiques
        // FALSE sinon
        function valid() {
            //TODO
            if (document.signup.password.value != document.signup.password2.value) {
                alert ("Les mots de passe ne correspendent pas !");
                return false;
            }
            return true;
        }
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>