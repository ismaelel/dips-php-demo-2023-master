<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require __DIR__.'/../view/head-main-css.php' ?>
    <?php require __DIR__.'/../view/head-main-js.php' ?>
    <title>Nous contacter</title>
</head>
<body>
<?php require __DIR__.'/../view/header.php' ?>

<main>
    <h2>Qst 1</h2>
    <?php
    $star = 8;
    $length = $star;

    for ($i=0; $i < $length; $i++) { 
        echo str_repeat("*", $star);
        $star--;
        echo "<br>";
    }

    ?>
    <h2>Qst 2</h2>
    <?php 
    $star = 8;
    
    for ($i=0; $i < $length; $i++) { 
        $space = $length - 1 - $i;
        echo str_repeat("&nbsp", $space);
        echo str_repeat("*", $length+1-$star);
        $star--;
        echo "<br>";
    }
    ?>
    <h2>Qst 3</h2>

    <?php
    
    $tab = ['google.com', 'php.net', 'wordpress.com'];
    foreach ($tab as $value) { ?>
        <a href="<?php echo $value ?>"> 
        
        <?php echo $value ?>

        </a><br>
    
    <?php }

    ?>

    <h2>Qst 4</h2>
    <?php
     $col = 20;
     $lignes = 700;
    ?>
    <table>
    <thead>
            <tr>
            <th colspan="<?php echo $col ?>">Montableau</th>
            </tr>
        </thead>
        <tbody>
    <?php
        
       

        for ($i=0; $i < $lignes ; $i++) { ?>
        <tr>
            <?php for ($j=0; $j < $col ; $j++) {?>
            <td><?php echo $i+$j+1?></td>
            <?php }?>
        </tr>
        <?php
        }

    ?>
    </tbody>
    </table>

    
<style>
    table,
td {
  border: 1px solid #333;
}

thead,
tfoot {
  background-color: #333;
  color: #fff;
}
</style>
</main>

<?php require __DIR__.'/../view/footer.php' ?>
</body>
</html>