<?php

if(isset($_POST['register_form'])) {
    if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['type_user']) ) {
        require_once('../app/ConnexionBDD.php');

        $req = $db->prepare("INSERT INTO utilisateur SET login = ?, password = ?, type_utilisateur = ?");

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['username'], $password, $_POST['type_user']]);

        header('Location: index.php');

        exit();
    }
}

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/theme.css">
    <script src="https://kit.fontawesome.com/f59e24d178.js" crossorigin="anonymous"></script>
</head>
<div class="container login-container">
    <div class="col-md-6 login-form-1">
        <h3>Formulaire de Contact</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder=" Login" value="" />
            </div>
            <div class="form-group">
                <input type="text" name="type_user" class="form-control" placeholder="Type utilisateur" value="" />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe *" value="" />
            </div>
            <div class="form-group">
                <input type="submit" name="register_form" class="btnSubmit" value="Ajouter" />
            </div>
        </form>
    </div>
</div>
