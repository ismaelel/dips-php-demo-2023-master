<?php



class ProductsController {

    public static function index() {
        $products = self::getAllProducts();

        var_dump($products);
    }

    public static function create(){
        include ("form.php");
    }



    public static function store() {
        //echo 'store';

        //var_dump($_POST);

        if (isset($_POST['label']) && isset($_POST['description']) && isset($_POST['brand'])) {
           // echo "postes";
            $label = $_POST['label'];
            $description = $_POST['description'];
            $brand = $_POST['brand'];

            $dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';

            //echo $label . ' ' . $description . ' ' . $brand . ' ';

            try {
                $db = new PDO($dsn, 'root', '');

                $result = $db->prepare("INSERT INTO products (label, description, brand) VALUE (:label, :description, :brand)");

                $result->bindParam(':label', $label);
                $result->bindParam(':description', $description);
                $result->bindParam(':brand', $brand);

                $result->execute();

                //$products = $result->fetchAll(PDO::FETCH_ASSOC);
                 //var_dump($users);
            } catch (PDOException $e) {
                echo "ERROR ->". $e->getMessage() . '<br>';
                exit();
            }

        }
    }

    public static function getAllProducts () {

        $dsn = 'mysql:host=localhost;port=3306;dbname=mywebsite';


        try {
            $db = new PDO($dsn, 'root', '');

            $result = $db->prepare("SELECT * FROM products");

            $result->execute();

            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($users);
        } catch (PDOException $e) {
            echo "ERROR ->". $e->getMessage() . '<br>';
            exit();
        }

        return $products;

    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //  var_dump($_POST);
    ProductsController::store();

}

//ProductsController::index();
//ProductsController::create();