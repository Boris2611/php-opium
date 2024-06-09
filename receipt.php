<?php 
include 'session_checker.php'; // Uključivanje provere sesije
include 'conn.php'; // Uključivanje konekcije sa bazom podataka

$user_id = $_SESSION['user_id']; // Dobijanje ID-ja korisnika iz sesije
$totalPrice = 0.00; // Inicijalizacija ukupne cene na nulu

// SQL upit za dobijanje stavki u korpi za datog korisnika
$sql = "SELECT * 
        FROM cart
        INNER JOIN item ON cart.item_id = item.ID
        WHERE user_id = :user_id
        ";
$stmt = $pdo->prepare($sql); // Priprema SQL upita
$stmt->bindParam(':user_id', $user_id); // Povezivanje parametra :user_id sa vrednošću $user_id
$stmt->execute(); // Izvršavanje SQL upita
$items = $stmt->fetchAll(); // Dobijanje rezultata upita

// Računanje ukupne cene stavki u korpi
foreach($items as $item){
    $totalPrice += $item['cena'];
}

// Formatiranje cene u obliku sa dve decimale
$priceFormat = number_format($totalPrice, 2);

// Dobijanje trenutnog datuma i vremena
$date = date('d/m/Y h:i:s a', time());
// Kreiranje poruke o potvrdi kupovine
$receipt = "Uspešna kupovina za $$priceFormat, $date";

?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiskalni račun</title>
    <link href="css/styles_edit.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/icon.png"/>
</head>
<body>
    <div class="container_2">
        <div class="logo">
            <img src="assets/icon.png" alt="Logo">
        </div>
        <div class="receipt-header">
            <h1>Fiskalni račun</h1>
        </div>
        <div class="receipt-info">
            <p><strong>Datum:</strong> <?php echo date('d.m.Y H:i'); ?></p>
            <p><strong>Adresa:</strong> Beograd, Takovska 10</p>
            <p><strong>Poštanski broj:</strong> 11000</p>
        </div>
        <div class="receipt-items">
            <ul>
                <?php foreach($items as $item): ?>
                    <li>
                        <img src="<?php echo $item['Slika1']; ?>" alt="<?php echo $item['Ime']; ?>">
                        <div>
                            <span><?php echo $item['brend'] . ' ' . $item['Ime']; ?></span>
                            <b><?php echo number_format($item['cena'], 2); ?> din</b>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="receipt-footer">
            <p><strong>Ukupno: <?php echo number_format($totalPrice, 2); ?> din</strong></p>
            <p><strong>Besplatna dostava:</strong> Da</p>
            <p>Hvala Vam na kupovini!</p>
            <form action="rm_receipt.php">
                <button class="btn">Nazad</button>
            </form>
        </div>
    </div>
</body>
</html>
