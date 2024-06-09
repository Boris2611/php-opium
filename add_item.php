<?php 
    include 'session_checker.php';
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dodaj stavku</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.jpg"/>
    <link href="css/styles_edit.css" rel="stylesheet"/>
</head>
<body>
    <form action="ins_item.php" method="post" id="formLogin">
        <div class="back">
            <div class="divCenterCart">
                <div class="content">
                    <h3>Dodaj stavku</h3>
                    <hr/>

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Ime stavke" name="Ime" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="number" step="0.01" class="form-control" id="price" placeholder="Cena" name="cena" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="img_src" placeholder="Izvor slike" name="Slika1" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="img_bg_src" placeholder="Izvor slike prilikom prelaska mišem" name="Slika2" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <textarea class="form-control" id="description" placeholder="Opis stavke" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="sifra_proizvoda" placeholder="Šifra proizvoda (samo cifre)" name="sifra_proizvoda" pattern="[0-9]+" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="brand" placeholder="Brend" name="brend" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="text" class="form-control" id="note" placeholder="Note" name="note" required>
                    </div>

                    <div class="form-group">
                        <br>
                        <select class="form-control" id="pol" name="Pol" required>
                            <option value="" selected disabled hidden>Odaberi pol</option>
                            <option value="muski">Muški</option>
                            <option value="zenski">Ženski</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                    
                    <br>
                    <button type="submit" class="btn">Dodaj stavku</button>
                    <hr/>
                    <a href="admin.php">Otkaži</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
