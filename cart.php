<?php 
include 'session_checker.php'; 
include 'conn.php';

$user_id = $_SESSION['user_id'];
$ukupnaCena = 0.00;

$sql = "SELECT * 
        FROM cart
        INNER JOIN item ON cart.item_id = item.ID
        WHERE user_id = :user_id
        ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$items = $stmt->fetchAll();

foreach($items as $item){
    $ukupnaCena += $item['cena'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Korpa</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.png"/>
    <link href="css/styles_edit.css" rel="stylesheet"/>
</head>
<body>

    <div class="container">
        <div class="left-column">
            <div class="contentCart">
            <?php if(empty($items)): ?>
                <h3 class="empty">Korpa je prazna</h3>
                <img src="assets/empty-cart.png" class="empty-cart-image">
                <p>Da biste dodali proizvode u korpu, <a class="orange" href="index.php">nastavite sa kupovinom</a>.</p>
            <?php else: ?>

                    <h3>
                        Ukupno - <?php echo number_format($ukupnaCena, 2) ?>din
                        <br>
                        <form action="receipt.php?user=<?php echo $user_id?>" class="checkout-form">
                            <label for="ime">Ime:</label>
                            <input type="text" id="ime" name="ime" required>

                            <label for="prezime">Prezime:</label>
                            <input type="text" id="prezime" name="prezime" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="adresa">Adresa:</label>
                            <input type="text" id="adresa" name="adresa" required>

                            <label for="grad">Grad:</label>
                            <input type="text" id="grad" name="grad" required>

                            <label for="zip">Poštanski broj:</label>
                            <input type="text" id="zip" name="zip" required>

                            <label for="card">Broj kartice:</label>
                            <input type="text" id="card" name="card" required>

                            <label for="expiry">Datum isteka:</label>
                            <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>

                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" required>


                            <input type="submit" value="Plaćanje" class="btn">
                        </form>
                    </h3>
                    </div>
        </div>

        <div class="right-column">
            <div class="proizvodi">
            <ul class="ulCart">
                        <?php foreach($items as $item): ?>
                            <li class="nav">
                                <img class="imgCart" src="<?php echo $item['Slika1']?>">
                                <p class="cartText">
                                    <?php echo $item['brend'] . ' ' . $item['Ime'] . ' - ' ?><b><?php echo number_format($item['cena'], 2) ?>din</b> &nbsp 
                                    <a title="Ukloni stavku" class="cartDel" href="rm_cart.php?cart_id=<?php echo $item['cart_id']?>">
                                        <i class="bi bi-x-lg"></i> Ukloni stavku
                                    </a>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer class="footerCart">
                <hr class="hrCart"/>
                <form action="index.php">
                    <button class="btn submit" type="submit">Nazad</button>
                </form>
            </footer>




   

</body>
</html>
