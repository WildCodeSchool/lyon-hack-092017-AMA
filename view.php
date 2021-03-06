<?php
require_once 'CurlConnect.php';
include "config/token.php";


$connect = new \Wcs\CurlConnect();
if (isset($_POST)) {

    if (isset($_POST['user']) and !empty($_POST['user'])) {
        $user = $_POST['user'];
        $link = $connect->getLink($user);
        $result = $connect->getConnect($user, $token);
        if ($result['message'] === "Not Found") {
            header('Location: index.php');
        }
    }

        $avatar = $connect->getAvatar($result);


    if (isset($_POST['threeRepo']) and !empty($_POST['threeRepo'])) {
        $threeRepos = $connect->getThreeRepo($result);
    }

    if (isset($_POST['nbFollowers']) and !empty($_POST['nbFollowers'])) {
        $nbFollowers = $connect->getNbFollowers($result);
    }

    if (isset($_POST['nbRepos']) and !empty($_POST['nbRepos'])) {
        $nbRepo = $connect->getNbRepos($result);
    }
    //header('Location: view.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Snippet</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<!-------------TEXTAREA------------------>
<div class="container">
    <div class="row">
        <div class="form-group">
            <label for="comment">Code</label>
            <textarea class="form-control " rows="20" id="comment">
                    <?php !empty($_POST) ? include 'textarea.php' : ''; ?>
    </textarea>
        </div>
        <button class="btn btn-info" id="copy-button" data-clipboard-target="#comment">Copier le code</button>        <!---------------VIEW------------------->
        <p>Ce code permet d'avoir l'aperçu suivant :</p>
        <div>

            <?php include 'textarea.php'; ?>

        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
<script src="script.js"></script>
</body>
</html>