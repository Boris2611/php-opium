<?php  
include 'session_checker.php'; 
include 'conn.php';

// Dohvat informacija o korisniku
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Podešavanje podrazumevanog sortiranja i filtriranja
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'default';
$genderOption = isset($_GET['gender']) ? $_GET['gender'] : 'all';

// Konstrukcija SQL upita u zavisnosti od izabranih opcija
$sql = "SELECT * FROM item";

if ($genderOption !== 'all') {
    $sql .= " WHERE Pol = :gender";
}

switch ($sortOption) {
    case 'price_asc':
        $sql .= " ORDER BY cena ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY cena DESC";
        break;
    case 'name_asc':
        $sql .= " ORDER BY Ime ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY Ime DESC";
        break;
    default:
        // Ako je sortiranje podrazumevano ili nije odabrano, ne dodajemo dodatne klauzule za sortiranje
        break;
}

// Priprema i izvršavanje SQL upita
$stmt = $pdo->prepare($sql);

if ($genderOption !== 'all') {
    $stmt->bindParam(':gender', $genderOption);
}

$stmt->execute();
$items = $stmt->fetchAll();


// Dohvat korpe za trenutnog korisnika
$sql = "SELECT * FROM cart WHERE cart.user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cartItems = $stmt->fetchAll();

// Provera da li je korpa prazna
$cartEmpty = empty($cartItems);
?>





<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>opium</title>
    <link rel="icon" type="image/x-icon" href="assets/icon.png"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/modal.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a class="brand" href="index.php"><img class="logo" src="assets/logo.png"></a>
        <div class="nav">
            <ul class="nav-links">
                <li class="nav-item important">
                    <a class="nav-link active" href="index.php">Korisnik: <?php echo $username ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.html">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">O nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="anotherpage.php">Još jedna stranica</a>
                </li>
                <li class="nav-item important">
                    <a class="nav-link" href="cart.php">
                        <img class="cart-icon" src="assets/korpa.png">
                        <span class="badge"><?php echo count($cartItems)?></span>
                    </a>
                </li>
                <li class="nav-item important">
                    <form class="logout-form" action="logOut.php">
                        <button class="btn logout">Odjava</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>




<header class="header">
    <div class="container">
        <div class="text-center">
            <img class="header_img" src="assets/logo.png">
            <h1 class="heading">elegancija u svakom dahu</h1>
            <p class="subheading">naši parfemi govore više od reči</p>
        </div>
    </div>
</header>

<section class="products">
    <div class="container">
    <div class="filtracija">
    <div class="text-center" id="filter-options">
    <p class="filter_p">Sortiraj po:  &nbsp </p>
    <select id="sort-select" class="nav-link">
        <option value="default" <?php echo $sortOption === 'default' ? 'selected' : ''; ?>>Podrazumevano</option>
        <option value="price_asc" <?php echo $sortOption === 'price_asc' ? 'selected' : ''; ?>>Cena - rastuće</option>
        <option value="price_desc" <?php echo $sortOption === 'price_desc' ? 'selected' : ''; ?>>Cena - opadajuće</option>
        <option value="name_asc" <?php echo $sortOption === 'name_asc' ? 'selected' : ''; ?>>Naziv - A do Z</option>
        <option value="name_desc" <?php echo $sortOption === 'name_desc' ? 'selected' : ''; ?>>Naziv - Z do A</option>
    </select>
     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
    <p class="filter_p">Pol:  &nbsp </p>
    <select id="gender-select" class="nav-link">
        <option value="all" <?php echo $genderOption === 'all' ? 'selected' : ''; ?>>Svi</option>
        <option value="muski" <?php echo $genderOption === 'muski' ? 'selected' : ''; ?>>Muški</option>
        <option value="zenski" <?php echo $genderOption === 'zenski' ? 'selected' : ''; ?>>Ženski</option>
        <option value="unisex" <?php echo $genderOption === 'unisex' ? 'selected' : ''; ?>>Unisex</option>
    </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
    <p class="filter_p">Pretraga:  &nbsp </p>
<input type="text" id="search-input" class="nav-link" placeholder="Pretraži parfeme...">
<button id="search-btn" class="btn">Pretraži</button>
</div>
</div>

<div class="row">
    <?php foreach($items as $item){ ?>
        <div class="col">
    <div class="card">
        <h5 class="card-title ime"><?php echo isset($item['Ime']) ? $item['Ime'] : ''; ?></h5>
        <img class="card-img" 
             src="<?php echo isset($item['Slika1']) ? $item['Slika1'] : ''; ?>" 
             onclick="openModal(
                        '<?php echo isset($item['Ime']) ? $item['Ime'] : ''; ?>', 
                        '<?php echo isset($item['description']) ? $item['description'] : ''; ?>', 
                        '<?php echo isset($item['Slika1']) ? $item['Slika1'] : ''; ?>', 
                        '<?php echo isset($item['Slika2']) ? $item['Slika2'] : ''; ?>',
                        '<?php echo isset($item['ID']) ? $item['ID'] : ''; ?>',
                        '<?php echo isset($item['note']) ? $item['note'] : ''; ?>',
                        '<?php echo isset($item['brend']) ? $item['brend'] : ''; ?>',
                        '<?php echo isset($item['Pol']) ? $item['Pol'] : ''; ?>',
                        '<?php echo isset($item['sifra_proizvoda']) ? $item['sifra_proizvoda'] : ''; ?>',
                        '<?php echo isset($item['cena']) ? $item['cena']." din" : ''; ?>'
             )" 
             onmouseover="this.src='<?php echo isset($item['Slika2']) ? $item['Slika2'] : ''; ?>';"
             onmouseout="this.src='<?php echo isset($item['Slika1']) ? $item['Slika1'] : ''; ?>';" 
             style="cursor: pointer;" 
        />
        <div class="card-body">
            <div class="text-center">
                <p class="note">Note: <?php echo isset($item['note']) ? $item['note'] : ''; ?></p>
                <p class="brend">Brend: <?php echo isset($item['brend']) ? $item['brend'] : ''; ?></p>
                <p class="pol">Pol: <?php echo isset($item['Pol']) ? $item['Pol'] : ''; ?></p>
                <p class="sifra">Šifra: <?php echo isset($item['sifra_proizvoda']) ? $item['sifra_proizvoda'] : ''; ?></p>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">
                <p class="cena">Cena: <span id="cena"><?php echo isset($item['cena']) ? $item['cena'] : ''; ?></span> din</p>
                <a class="btn" href="ins_cart.php?item_id=<?php echo isset($item['ID']) ? $item['ID'] : ''; ?>">Dodaj u korpu</a>
            </div>
        </div>
    </div>
</div>

    <?php } ?>
</div>



<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-left">
            <img id="modal-img" src="" alt="Cover image" class="modal-main-img">
            <div class="modal-thumbnails">
                <img id="modal-thumb1" src="" onclick="changeModalImage(this.src)" class="modal-thumb-img">
                <img id="modal-thumb2" src="" onclick="changeModalImage(this.src)" class="modal-thumb-img">
            </div>
        </div>
        <div class="modal-right">
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <br>
            <p class="note" id="modal-note"></p>
            <br>
            <p class="brend" id="modal-brend"></p>
            <p class="pol" id="modal-pol"></p>
            <p class="sifra" id="modal-sifra"></p>
            <br>
            <p class="cena" id="modal-cena"></p>
            <div class="text-center">
                <a class="btn modal_btn" id="addToCartBtn" href="#">Dodaj u korpu</a>
            </div>
            <div class="recommended-products">
                <h3>Preporučeni proizvodi: </h3>
                <div id="recommended-container" class="recommended-container"></div>
            </div>
        </div>
    </div>
</div>




<footer class="footer">
    <div class="container">
        <p class="text-center">Copyright &copy; Parfem Shop 2024</p>
    </div>
</footer>




<script>
    // JavaScript za zatvaranje modala klikom na pozadinu
window.addEventListener("click", function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.classList.remove("modal-open"); // Uklanjanje klase za omogućavanje pomicanja
    }
});


    document.addEventListener("DOMContentLoaded", function() {
        const sortSelect = document.getElementById("sort-select");
        const genderSelect = document.getElementById("gender-select");

        sortSelect.addEventListener("change", updateQueryString);
        genderSelect.addEventListener("change", updateQueryString);
    });

    function updateQueryString() {
        const sortSelect = document.getElementById("sort-select").value;
        const genderSelect = document.getElementById("gender-select").value;
        window.location.href = "index.php?sort=" + sortSelect + "&gender=" + genderSelect;
    }

    function openModal(title, description, imgSrc1, imgSrc2, itemID, note, brend, pol, sifra, cena) {
        document.getElementById("myModal").style.display = "block";
        document.body.classList.add("modal-open"); // Dodavanje klase za onemogućavanje pomicanja


        var modal = document.getElementById("myModal");
        var modalTitle = document.getElementById("modal-title");
        var modalDescription = document.getElementById("modal-description");
        var modalImg = document.getElementById("modal-img");
        var modalThumb1 = document.getElementById("modal-thumb1");
        var modalThumb2 = document.getElementById("modal-thumb2");
        var modalNote = document.getElementById("modal-note");
        var modalBrend = document.getElementById("modal-brend");
        var modalPol = document.getElementById("modal-pol");
        var modalSifra = document.getElementById("modal-sifra");
        var modalCena = document.getElementById("modal-cena");
        var addToCartBtn = document.getElementById("addToCartBtn");

        modal.style.display = "block";
        modalTitle.textContent = title;
        modalDescription.textContent = description;
        modalImg.src = imgSrc1;
        modalThumb1.src = imgSrc1;
        modalThumb2.src = imgSrc2;
        modalNote.textContent = "Note: " + note;
        modalBrend.textContent = "Brend: " + brend;
        modalPol.textContent = "Pol: " + pol;
        modalSifra.textContent = "Šifra: " + sifra;
        modalCena.textContent = "Cena: " + cena;
        addToCartBtn.href = "ins_cart.php?item_id=" + itemID;

        document.body.classList.add('modal-open');

        generateRecommendedProducts(itemID);
    }

    
    function closeModal() {
    document.getElementById("myModal").style.display = "none";
    document.body.classList.remove("modal-open"); // Uklanjanje klase za omogućavanje pomicanja
        
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function changeModalImage(imgSrc) {
    var modalImg = document.getElementById("modal-img");
    modalImg.src = imgSrc;
}

    function generateRecommendedProducts(currentItemId) {
        var recommendedContainer = document.getElementById("recommended-container");
        recommendedContainer.innerHTML = '';

        var items = <?php echo json_encode($items); ?>;
        var recommendedItems = items.filter(function(item) {
            return item.ID != currentItemId;
        });

        for (var i = 0; i < 3; i++) {
    (function(recommendedItem) {
        var div = document.createElement('div');
        div.classList.add('recommended-item');
        div.onclick = function() {
            openModal(
                recommendedItem.Ime,
                recommendedItem.description,
                recommendedItem.Slika1,
                recommendedItem.Slika2,
                recommendedItem.ID,
                recommendedItem.note,
                recommendedItem.brend,
                recommendedItem.Pol,
                recommendedItem.sifra_proizvoda,
                recommendedItem.cena + " din"
            );
        };

        var img = document.createElement('img');
        img.src = recommendedItem.Slika1;
        div.appendChild(img);

        recommendedContainer.appendChild(div);
    })(recommendedItems[i]);
}
    }

    window.addEventListener('scroll', function() {
        document.body.classList.toggle('scrolled', window.scrollY > 50);
    });

    document.getElementById("search-btn").addEventListener("click", performSearch);

    function performSearch() {
        var searchText = document.getElementById("search-input").value.toLowerCase();
        var productCards = document.querySelectorAll(".col");

        productCards.forEach(function(card) {
            var productName = card.querySelector(".card-title").textContent.toLowerCase();
            card.style.display = productName.includes(searchText) ? "block" : "none";
        });
    }

    document.getElementById("search-input").addEventListener("input", function() {
        if (this.value === "") {
            var productCards = document.querySelectorAll(".col");
            productCards.forEach(function(card) {
                card.style.display = "block";
            });
        }
    });
</script>


</body>
</html>
