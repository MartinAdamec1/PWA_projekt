
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['korisnicko_ime']) && isset($_POST['lozinka'])) {
    
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT id, lozinka, administratorska_prava, ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $korisnicko_ime);
    $stmt->execute();
    $stmt->store_result();
    

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $admin, $ime);
        $stmt->fetch();

        if (password_verify($lozinka, $hashed_password)) {
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            $_SESSION['administratorska_prava'] = $admin;
            $_SESSION['ime'] = $ime;
        } else {
            echo "Pogrešno korisničko ime ili lozinka. <a href='registracija.php'>Registriraj se</a>";
            exit();
        }
    } else {
        echo "Pogrešno korisničko ime ili lozinka. <a href='registracija.php'>Registriraj se</a>";
        exit();
    }

    $stmt->close();
}

if (!isset($_SESSION['korisnicko_ime'])) {
    ?>
    <form class="prijava" action="administrator.php" method="post">
        <label for="korisnicko_ime">Korisničko ime:</label><br>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>
        <label for="lozinka">Lozinka:</label><br>
        <input type="password" id="lozinka" name="lozinka" required><br><br>
        <input type="submit" value="Prijavi se">
    </form>
    <div class="prijava">
    <a class="prijava" href="registracija.php">Registriraj se</a>
    </div>
    <?php
    exit();
}

if ($_SESSION['administratorska_prava'] == 0) {
    echo "<div class='odjava'>";
    echo "Pozdrav, " . htmlspecialchars($_SESSION['ime']) . ". Nemate prava pristupa ovoj stranici.";
    echo "</div>";
    if (isset($_SESSION['korisnicko_ime'])) {
        echo "<div class='odjava'>";
        echo "<form action='odjava.php' method='post'>";
        echo "<button class='odjava' type='submit'>Odjava</button>";
        echo "</form>";
        echo "</div>";
    }
    exit();
}
?>



<header>
    <nav>
        <a href="index.php">HOME</a>
        <a href="politik.html">ČLANCI</a>
        <a href="kategorije.php?category=sport">SPORT</a>
        <a href="kategorije.php?category=kultura">KULTURA</a>
        <a href="unos.html">UNOS</a>
        <a href="registracija.php">REGISTRACIJA</a>
        <a href="administrator.php">ADMINISTRATOR</a>
    </nav>
</header>
<hr>
<h1 class="title">Administrator - Uređivanje vijesti</h1>
<hr>
<main>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
        $sql = "DELETE FROM vijesti WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Vijest je uspješno obrisana.";
        } else {
            echo "Greška pri brisanju vijesti: " . $conn->error;
        }
        $stmt->close();
    } elseif (isset($_POST['update_id'])) {
        $id = $_POST['update_id'];
        $title = $_POST['title'];
        $about = $_POST['about'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $archive = isset($_POST['archive']) ? 1 : 0;
        $image_name = $_POST['current_image'];

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $image_name = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $upload_dir = "uploads/";
            move_uploaded_file($image_temp, $upload_dir . $image_name);
        }

        $sql = "UPDATE vijesti SET title=?, about=?, content=?, image=?, category=?, archive=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $title, $about, $content, $image_name, $category, $archive, $id);
        if ($stmt->execute()) {
            echo "Vijest je uspješno ažurirana.";
        } else {
            echo "Greška pri ažuriranju vijesti: " . $conn->error;
        }
        $stmt->close();
    }
}

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    $sql = "SELECT title, about, content, image, category, archive FROM vijesti WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        exit();
    }

    $stmt->close();
    ?>
<div class="text-container">
    <form action="administrator.php" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($row['image']); ?>">
        <label for="title">Naslov:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"><br><br>
        <label for="about">O vijesti:</label><br>
        <textarea id="about" name="about"><?php echo htmlspecialchars($row['about']); ?></textarea><br><br>
        <label for="content">Sadržaj:</label><br>
        <textarea id="content" name="content"><?php echo htmlspecialchars($row['content']); ?></textarea><br><br>
        <label for="category">Kategorija:</label><br>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($row['category']); ?>"><br><br>
        <label for="image">Slika:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <label for="archive">Arhiviraj:</label>
        <input type="checkbox" id="archive" name="archive" <?php if ($row['archive']) echo 'checked'; ?>><br><br>
        <input type="submit" value="Ažuriraj vijest">
    </form>
</div>
    <?php
} else {
    $sql = "SELECT id, title, about, content, image, category, archive FROM vijesti";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='article'>";
            echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
            echo "<p>" . htmlspecialchars($row["about"]) . "</p>";
            echo "<p>" . htmlspecialchars($row["content"]) . "</p>";
            if ($row["image"]) {
                echo "<p><img src='uploads/" . htmlspecialchars($row["image"]) . "' alt='Slika'></p>";
            }
            echo "<p>Kategorija: " . htmlspecialchars($row["category"]) . "</p>";
            echo "<p>Arhivirano: " . ($row["archive"] ? "Da" : "Ne") . "</p>";
            echo "<a href='administrator.php?edit_id=" . $row["id"] . "'>Uredi</a> | ";
            echo "<form style='display:inline;' action='administrator.php' method='post' onsubmit='return confirm(\"Jeste li sigurni da želite obrisati ovu vijest?\");'>
                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                    <input type='submit' value='Obriši'>
                  </form>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>Nema dostupnih vijesti.</p>";
    }
}

$conn->close();
?>
</main>
<footer>
    <h2>Frankfurter Allgemeiner</h2>
</footer>
</body>
</html>
