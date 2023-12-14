<?php

$error_message = "Identifiants invalides";
if (isset($_POST['mail']) && isset($_POST['pwd'])) {
    session_start();
    $mail = $_POST['mail'] ?? '';
    $pwd = $_POST['pwd'];
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $name = $_POST['name'];

//    RECHERCHE BON ID

    $dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';


    try {
        $db = new PDO($dsn, 'root', '');

        //$result = $db->exec("INSERT INTO users (email, password, name) VALUE ('$mail','$pwd', '$name')");
        $result = $db->prepare("INSERT INTO users (email, password, name) VALUE (:mail, :pwd, :name)");

        $result->bindParam(':mail', $_POST['mail']);
        $result->bindParam(':pwd', $pwd);
        $result->bindParam(':name', $_POST['name']);

        $result->execute();
    } catch (PDOException $e) {
        echo $e->getMessage() . '<br>';
        exit();
    }

    $_SESSION['mail'] = $mail;
    $_SESSION['id'] = $db->lastInsertId();
    header("Location: index.php");

    // header("Location: index.php");
}
// Puis une redirection PHP de la requête

exit();