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
    <div class="row"> <!--pad-botm-->
      <div class="col-md-12">
        <h4 class="header-line">LOGIN CHAT</h4>
      </div>
    </div>

    <!--On insère le formulaire de login-->
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 offset-md-3">

        <form method="POST" action="loginIndex">
          <div class="form-group">
            <label>Entrez votre pseudo</label>
            <input class="form-control" type="text" name="pseudo" />
          </div>

          <div class="form-group">
            <label>Mot de passe</label>
            <input class="form-control" type="password" name="password" />
            <p class="help-block">
              <a href="/projet_gorille/chatmvc/login/forgotpassword">Mot de passe oublié ?</a>
            </p>
          </div>

          <button type="submit" name="login" class="btn btn-info">LOGIN </button>&nbsp;&nbsp;&nbsp;<a href="/projet_gorille/chatmvc/login/signup">Je n'ai pas de compte</a>

        </form>
      </div>
    </div>
    <!---LOGIN PABNEL END-->
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>