<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
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
<h1 class="title">Frankfurter Allgemeiner</h1>
<hr>
<main>
<div class="odjava">
<form action="registracija.php" method="post">
    <label for="korisnicko_ime">Korisničko ime:</label><br>
    <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>
    <label for="lozinka">Lozinka:</label><br>
    <input type="password" id="lozinka" name="lozinka" required><br><br>
    <label for="ime">Ime:</label><br>
    <input type="text" id="ime" name="ime"><br><br>
    <label for="prezime">Prezime:</label><br>
    <input type="text" id="prezime" name="prezime"><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Registriraj se">
</form>
</div>
</main>
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
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = password_hash($_POST['lozinka'], PASSWORD_BCRYPT);
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];

    $sql = "INSERT INTO korisnik (korisnicko_ime, lozinka, ime, prezime, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $korisnicko_ime, $lozinka, $ime, $prezime, $email);

    if ($stmt->execute()) {
        echo "Registracija uspješna. <a href='administrator.php'>Prijavi se</a>";
    } else {
        echo "Greška pri registraciji: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
</body>
</html>
