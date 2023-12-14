<?php

$error_message = "Identifiants invalides";
if (isset($_POST['mail']) && isset($_POST['pwd'])) {
    session_start();
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

//    RECHERCHE BON ID

    $dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';


    try {
        $db = new PDO($dsn, 'root', '');

        //$result = $db->query("SELECT * FROM users where email = '$mail'");
        $result = $db->prepare("SELECT * FROM users where email = :mail");

        $result->bindParam(':mail', $mail);
        $result->execute();

        $users = $result->fetch(PDO::FETCH_ASSOC);
       // var_dump($users);
    } catch (PDOException $e) {
        echo "ERROR ->". $e->getMessage() . '<br>';
        exit();
    }

   // if ($mail_trouve && $pwd_trouve) {
    if ($users && password_verify($pwd, $users['password']) ) {
        $_SESSION['mail'] = $mail;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['id'] = $users['id'];
//        setcookie("mail", $mail, time() + (86400 * 30));
//        setcookie("pwd", $pwd, time() + (86400 * 30));
        var_dump($_SESSION);
        header("Location: index.php");
    }
    else{
        $_SESSION['error_msg'] = "Identifiants invalides";
        header("Location: login_bd.php");
    }
    // header("Location: index.php");
}
// Puis une redirection PHP de la requête

exit();