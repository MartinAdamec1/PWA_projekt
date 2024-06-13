<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frankfurter Allgemeiner</title>
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
    <?php
    session_start();
    if (isset($_SESSION['korisnicko_ime'])) {
        echo "<div class='odjava'>";
        echo "<form action='odjava.php' method='post'>";
        echo "<button class='odjava' type='submit'>Odjava</button>";
        echo "</form>";
        echo "</div>";
    }
    ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT title, about, content, category, image FROM vijesti WHERE archive = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='text-container'>";
            echo "<h2><u>" . $row["category"] . "</h2></u>";
            echo "<div class='naslov'>";
            echo "<p><b>" . $row["title"] . "</b></p>";
            echo "</div>";
            echo "<div class='image-container'>";
            if ($row["image"]) {
                echo "<p><img src='uploads/" . $row["image"] . "' alt='Slika'></p>";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class='text-container'>";
            echo "<div class='podnaslov'>";
            echo "<p>" . $row["about"] . "</p>";
            echo "</div>";
            echo "<div class='centered-paragraphs'>";
            echo "<p>" . $row["content"] . "</p>";
            echo "</div>";
            echo "</div>";
            
            echo "</div>";
        }
    } else {
        echo "<p>Nema dostupnih vijesti.</p>";
    }

    $conn->close();
    ?>
</main>
<footer>
    <h2>Frankfurter Allgemeiner</h2>
</footer>
</body>
</html>
