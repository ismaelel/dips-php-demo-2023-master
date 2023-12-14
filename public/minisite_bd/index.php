
<?php require __DIR__.'/menu.php';
//session_start();

$dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';
if (isset($_SESSION['mail'])) {

    $mail = $_SESSION['mail'];
    $id = $_SESSION['id'];

    try {
        $db = new PDO($dsn, 'root', '');

        $result = $db->query("SELECT * FROM users where email = '$mail'");
        $users = $result->fetch(PDO::FETCH_ASSOC);
        require __DIR__.'/home.php';
    } catch (PDOException $e) {
        echo $e->getMessage() . '<br>';
        exit();
    }
}
else{
    echo "T'as qu'à te connecter<h1>Mouhahahaha BD VA</h1>";
}
?>
<h2>
    <?php
    //echo $users['name'];
    ?>

</h2>







<?php require_once __DIR__ . '/footer.php';