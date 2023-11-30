<?php

//var_dump($_POST);


$error_message = "Identifiants invalides";
if (isset($_POST['mail']) && isset($_POST['pwd'])) {
    session_start();
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    if ($mail == "ismo" && $pwd == "ismo") {

        $_SESSION['mail'] = $mail;
        $_SESSION['pwd'] = $pwd;
//        setcookie("mail", $mail, time() + (86400 * 30));
//        setcookie("pwd", $pwd, time() + (86400 * 30));
        var_dump($_SESSION);
        header("Location: index.php");
    }
    else{
        $_SESSION['error_msg'] = "Identifiants invalides";
        header("Location: login.php");
    }
   // header("Location: index.php");
}
// Puis une redirection PHP de la requête

exit();