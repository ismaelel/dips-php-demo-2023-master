<?php

require __DIR__ . '/menu.php';


?>

<form action="registerController.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="mail" value="">
    <input type="text" name="pwd" value="">
    <input type="text" name="name" value="">
    <input type="submit" value="Valider">
</form>

<?php

if (!empty($_SESSION['error_msg'])) {
   // echo 'AAA<div style="color: red;">' . $_SESSION['error_msg'] . '</div>';
}

//require __DIR__.'/footer.php';?>
