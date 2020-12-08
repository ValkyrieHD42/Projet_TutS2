<?php

    if(isset($_SESSION))
    {
        session_destroy();
    }


    require('../app/UserDAO.php');
    require('../app/BadPasswordError.php');
    require('../app/BadUserError.php');

    if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        require_once('../app/ConnexionBDD.php');

        $checkPsw = new BadPasswordError($db);
        $chckUser = new BadUserError($db);

        $login = $_POST['username'];
        $mdp = $_POST['password'];

        $req = $db->prepare('SELECT * FROM utilisateur WHERE login = :login');

        $req->execute(['login' =>$login]);

        $user = $req->fetch();

        //var_dump($user);

        //var_dump($mdp);

        //echo $user['PASSWORD'];

        if($chckUser->check_user($login))
        {
            if($checkPsw->checkPassword($login,$mdp)) {
                $managerU = new UserDAO($db);
                $managerU->Read($login,$mdp);

                header('Location: index.php');

                //exit();

            }

        }

    }

    ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/theme.css">
    <script src="https://kit.fontawesome.com/f59e24d178.js" crossorigin="anonymous"></script>
</head>
<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-form">
                    <h3>Connexion</h3>
                    <hr>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="identifiant" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login_form" class="au-btn au-btn--block au-btn--rose m-b-20" value="Connexion" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>