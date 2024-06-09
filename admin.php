<?php  
include 'session_checker.php'; 
include 'conn.php';

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM item"; // Uklonili smo pokušaj pristupa koloni 'description'
$stmt = $pdo->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll();
?>  

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.jpg"/>
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a class="brand" href="admin.php"><b>opium Admin</b></a>
        <div class="nav">
            <ul class="nav-links">
                <li class="nav-item"><a class="nav-link active" href="admin.php"><?php echo $username ?></a></li>
                <li class="nav-item"><form class="logout-form" action="logOut.php"><button class="btn logout">Odjava</button></form></li>
            </ul>
        </div>
    </div>
</nav>

<header class="header">
    <div class="text-center">
        <h1 class="heading">Panel za administratore</h1>
    </div>
</header>

<form class="add_form" action="add_item.php">
    <button class="btn" type="submit">Dodaj Proizvod</button>
</form>

<section class="section">
    <div class="container">
        <div class="row">
            <?php foreach($items as $item){ ?>
            <div class="col">
                <div class="card">
                    <img class="card-img" src="<?php echo $item['Slika1']?>" onmouseover="this.src='<?php echo $item['Slika2']?>';" onmouseout="this.src='<?php echo $item['Slika1']?>';" alt="..." />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"><?php echo $item['Ime']?></h5>
                            <?php echo $item['cena']?>din
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center"><a class="btn" href="rm_item.php?item_id=<?php echo $item['ID']?>">Ukloni</a></div>
                        <div class="text-center"><a class="btn" href="edit_item.php?item_id=<?php echo $item['ID']?>">Izmeni</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
</body>
</html>
