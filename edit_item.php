<?php 
include 'session_checker.php'; 
include 'conn.php';

$item_id = $_GET['item_id']; 

$sql = "SELECT * FROM item WHERE ID = :item_id"; 
$query = $pdo->prepare($sql); 
$query->bindParam(':item_id', $item_id); 
$query->execute(); 
$result = $query->fetch(PDO::FETCH_ASSOC);  

if (!$result) {
    echo "Item not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="sr"> 
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Izmeni stavku</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.jpg"/>
    <link href="css/styles_edit.css" rel="stylesheet"/>
</head>
<body>
    <form action="upd_item.php?item_id=<?php echo $item_id ?>" method="post" id="formLogin">
        <div class="back">
            <div class="divCenterCart">
                <div class="content">
                    <h3>Izmeni stavku</h3>
                    <hr/>

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Ime stavke" name="Ime" value="<?php echo htmlspecialchars($result['Ime']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="number" step="0.01" class="form-control" id="price" placeholder="Cena" name="cena" value="<?php echo htmlspecialchars($result['cena']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="img_src" placeholder="Izvor slike" name="Slika1" value="<?php echo htmlspecialchars($result['Slika1']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="img_bg_src" placeholder="Izvor slike prilikom prelaska mišem" name="Slika2" value="<?php echo htmlspecialchars($result['Slika2']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <textarea class="form-control" id="description" placeholder="Opis stavke" name="description" required><?php echo htmlspecialchars($result['description']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="sifra_proizvoda" placeholder="Šifra proizvoda (samo cifre)" name="sifra_proizvoda" pattern="[0-9]+" value="<?php echo htmlspecialchars($result['sifra_proizvoda']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="brand" placeholder="Brend" name="brend" value="<?php echo htmlspecialchars($result['brend']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="note" placeholder="Note" name="note" value="<?php echo htmlspecialchars($result['note']); ?>" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <select class="form-control" id="pol" name="Pol" required>
                            <option value="" selected disabled hidden>Odaberi pol</option>
                            <option value="muski" <?php if ($result['Pol'] == 'muski') echo 'selected'; ?>>Muški</option>
                            <option value="zenski" <?php if ($result['Pol'] == 'zenski') echo 'selected'; ?>>Ženski</option>
                            <option value="unisex" <?php if ($result['Pol'] == 'unisex') echo 'selected'; ?>>Unisex</option>
                        </select>
                    </div>
                    
                    <br>
                    <button type="submit" class="btn">Izmeni stavku</button> 
                    <hr/>
                    <a href="admin.php">Otkaži</a> 
                </div>
            </div>
        </div>
    </form>
</body>
</html>
