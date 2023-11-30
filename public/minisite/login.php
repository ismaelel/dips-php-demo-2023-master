<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLEAUX</title>
</head>
<body>
<?php require __DIR__.'/menu.php';


?>

<form action="test_login.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="mail" value="ismo">
    <input type="text" name="pwd" value="ismo">
    <input type="submit" value="Envoyer">
</form>


<?php

if (!empty($_SESSION['error_msg'])) {
    echo '<div style="color: red;">' . $_SESSION['error_msg'] . '</div>';
}

require __DIR__.'/footer.php';?>
</body>
</html>