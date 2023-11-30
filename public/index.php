<!DOCTYPE html>
<html lang="fr">
    <head>
    <?php require __DIR__.'/../view/head-main-css.php' ?>
    <?php require __DIR__.'/../view/head-main-js.php' ?>
    <title>Accueil</title>
    </head>
<body>
    <?php require __DIR__.'/../view/header.php' ?>
    
    <main>

        <?php
        // Pratique

        // Qst 1

        $prix_unitaire_ht = 100;
        $taux_tva = 0.20;
        $nb_articles=0;

        $ttc = $prix_unitaire_ht + ($prix_unitaire_ht * $taux_tva);
        echo $ttc;

        // Qst 2

        $duree_sec = time();
        $duree_h = $duree_sec / 3600;	

        //echo "<br>EN HEURES : ". $duree_h;
        
        $d=mktime(0,0,$duree_sec);
        echo "<br>" . $duree_h ."secondes = ".date("H:i:s", $d);
        echo "<br>";
        echo date("H",$d). " heure(s) ". date("i",$d). " minute(s) " . date("s",$d). " seconde(s)";

        // Qst 3

        $remise = 0;

        $prix = 5000;
        echo "<br>PRIX DEPART : ". $prix ."<br>";
        if ($prix >= 100 && $prix <= 500) {
            $remise = 0.05;
        }
        elseif ($prix > 500) {
            $remise = 0.15;
        }

        
        echo "PRIX FINAL :" . $prix - $prix * $remise;

        // Qst 4

        $h_courante = date('G')+1;
        $m_courante = date('i');

        $h_var = 22;
        $m_var = 59;
        echo "<br>";

        echo "Heure :" . $h_var . " minutes :" . $m_var . "<br>";
        if ($h_var <= 5 && $h_var >= 23) {
            echo "Bonne nuit";
        }
        else if ($h_var >= 5 && $h_var < 12) {
            echo "Bonne matinée";
        }
        else if ($h_var >= 12 && $h_var < 13 || $h_var == 13  && $m_var <= 30) {
            echo "Bon appétit";
        }
        else if ($h_var > 13 && $h_var < 18 || $h_var == 13 && $m_var > 30) {
            echo "Bonne après-midi";
        }
        else if ($h_var >= 18 && $h_var < 23) {
            echo "Bonne soirée";
        }

        

        
        
        ?>
    </main>
    
    <?php require __DIR__.'/../view/footer.php' ?>
</body>
</html>