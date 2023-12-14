<?php

try {
    $dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';
    $db = new PDO($dsn, 'root', '');
    session_start();

    $user_id = $_SESSION['id'];
    if (empty($user_id)) {
        header('Location:   login_bd.php');
        exit();
    }

    if (isset($_POST['titre']) && $_POST['texte']) {
        $req_note = $db->prepare("INSERT INTO notes (titre, texte, idUser) VALUE (:titre, :texte, :idUser)");

        $req_note->bindParam(':titre', $_POST['titre']);
        $req_note->bindParam(':texte', $_POST['texte']);
        $req_note->bindParam(':idUser', $_SESSION['id']);

        $req_note->execute();
        //var_dump($_SESSION['id']);
    }
} catch (PDOException $e) {
    echo $e->getMessage() . '<br>';
    exit();
}

header("Location: index.php");
exit();



