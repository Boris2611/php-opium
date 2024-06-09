<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Prijava</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.jpg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="css/styles_forms.css" rel="stylesheet"/>
</head>

<?php
    $poruka = "";
    if (isset($_GET['register'])) {
        if ($_GET['register'] == 1) {
            $poruka = "Uspešna registracija";
        }
    }
    $greska = "";
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 2) {
            $greska = "Pogrešno korisničko ime/šifra";
        }
    }
?>

<body class="bg justify-content-center">
    <form action="check_user.php" method="post" id="formLogin">
        <div class="back">
            <div class="center">
                <div class="content">

                    <h3>Prijava</h3>
                    <hr/>

                    <div class="form-group">
                        <input type="username" class="control" id="username" placeholder="Korisničko ime" name="username" required>
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="password" class="control" id="password" placeholder="Šifra" name="password" required>
                    </div><br>

                    <h5><?php echo $greska ?></h5>

                    <h5><?php echo $poruka ?></h5>

                    <button type="submit" class="btn">Prijavi se</button>

                    <hr/>
                    <p>Nemate nalog?</p>
                    <a href="register.php">Registrujte se</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
