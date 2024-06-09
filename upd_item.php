<?php
include 'session_checker.php';
include 'conn.php';

$item_id = $_GET['item_id'];

// Check if form fields are set
if (isset($_POST['Ime']) && isset($_POST['cena']) && isset($_POST['Slika1']) && isset($_POST['Slika2']) && isset($_POST['description']) && isset($_POST['sifra_proizvoda']) && isset($_POST['brend']) && isset($_POST['note']) && isset($_POST['Pol'])) {
    $name = $_POST['Ime'];
    $price = $_POST['cena'];
    $img_src = $_POST['Slika1'];
    $img_bg_src = $_POST['Slika2'];
    $description = $_POST['description'];
    $sifra_proizvoda = $_POST['sifra_proizvoda'];
    $brand = $_POST['brend'];
    $note = $_POST['note'];
    $pol = $_POST['Pol'];

    $sql = "UPDATE item SET Ime = :name, cena = :price, Slika1 = :img_src, Slika2 = :img_bg_src, description = :description, sifra_proizvoda = :sifra_proizvoda, brend = :brand, note = :note, Pol = :pol WHERE ID = :item_id";

    $query = $pdo->prepare($sql);
    $query->bindParam(':name', $name);
    $query->bindParam(':price', $price);
    $query->bindParam(':img_src', $img_src);
    $query->bindParam(':img_bg_src', $img_bg_src);
    $query->bindParam(':description', $description);
    $query->bindParam(':sifra_proizvoda', $sifra_proizvoda);
    $query->bindParam(':brand', $brand);
    $query->bindParam(':note', $note);
    $query->bindParam(':pol', $pol);
    $query->bindParam(':item_id', $item_id);

    try {
        $query->execute();
        header('Location: admin.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "All fields are required!";
}
?>
