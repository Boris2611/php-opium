<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Registracija</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.jpg"/>
    <link href="css/styles_forms.css" rel="stylesheet"/>
</head>
<body class="bg justify-content-center">
    <!-- Forma za registraciju -->
    <form action="ins_register.php" method="post" id="formLogin">
        <div class="back">
            <div class="center">
                <div class="content">
                    <h3>Registracija</h3>
                    <hr/>

                    <!-- Polje za unos korisničkog imena -->
                    <div class="form-group">
                        <input type="username" class="control" id="username" placeholder="Korisničko ime" name="username" required>
                    </div>
                    <br>

                    <!-- Polje za unos e-pošte -->
                    <div class="form-group">
                        <input type="email" class="control" id="email" placeholder="E-pošta" name="email" required>
                    </div>
                    <br>
                    
                    <!-- Polje za unos lozinke -->
                    <div class="form-group">
                        <input type="password" class="control" id="password" placeholder="Lozinka" name="password" required> 
                    </div>

                    <br>
                    <!-- Dugme za registraciju -->
                    <button type="submit" class="btn">Registruj se</button>
                    <hr/>
                    <!-- Link za otkazivanje i povratak na stranicu za prijavljivanje -->
                    <a href="login.php">Otkaži</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
