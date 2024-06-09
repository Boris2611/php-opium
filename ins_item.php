<?php 
    include 'conn.php';
    include 'session_checker.php';

    $name = $_POST['Ime'];
    $price = $_POST['cena'];
    $img_src = $_POST['Slika1'];
    $img_bg_src = $_POST['Slika2'];
    $description = $_POST['description']; 
    $pol = $_POST['Pol']; 
    $sifra_proizvoda = $_POST['sifra_proizvoda']; 
    $brand = $_POST['brend']; 
    
    $sql = "INSERT INTO item (Ime, cena, Slika1, Slika2, description, Pol, sifra_proizvoda, brend) 
            VALUES (:name, :price, :img_src, :img_bg_src, :description, :pol, :sifra_proizvoda, :brand)";
    
    $stmt = $pdo->prepare($sql); 
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':img_src', $img_src);
    $stmt->bindParam(':img_bg_src', $img_bg_src);
    $stmt->bindParam(':description', $description); 
    $stmt->bindParam(':pol', $pol);
    $stmt->bindParam(':sifra_proizvoda', $sifra_proizvoda); 
    $stmt->bindParam(':brand', $brand); 
    
    $stmt->execute();
    
    header("Location: admin.php");
?>
