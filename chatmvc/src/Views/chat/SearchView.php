<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <title>Messagerie instantanee</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- CUSTOM STYLE  -->
    <link href="../public/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row"> <!--pad-botm-->
            <div class="col-md-12">
                <div style="float:right"><a href="../chat/ChatView/1">Retour</a></div>
                <h2>RECHERCHE DANS LE CHAT</h2>
                <h4>Vous êtes connecté en tant que <?php echo $data['user'] ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <input type="text" id="keyword" placeholder="Saisir un mot clé">
                    <input type="button" id="submit" value="Envoyer" />
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="filteredmsg"></div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    // On attend que la page soit complètement chargée
    $(document).ready(function() {
        // On écoute le clic sur le bouton de soumission du formulaire
        $("#submit").click(function() {
            // On récupère le mot clé
            let str = $("#keyword").val();
            // Si la chaine n'est pas vide, on fait l'appel AJAX
            if (str != '') {
                // Appel avec une méthode POST
                // Le valeur passée au serveur sous forme d'un objet JSON
                // Les messages sont renvoyés dans la variable returnData
                $.post('search', {
                    keyword: str
                }, function(returnData) {
                    // On affiche les messages provenant de la réponse du serveur
                    $("#filteredmsg").append(returnData);
                })
            }
        })
    })
</script>

</html>