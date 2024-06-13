<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultat forme</title>
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
<div class="article">
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
        if (isset($_POST['title']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['category'])) {
            $title = $_POST['title'];
            $about = $_POST['about'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $archive = isset($_POST['archive']) ? 1 : 0;
            $image_name = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image_name = $_FILES['image']['name'];
                $image_temp = $_FILES['image']['tmp_name'];
                $upload_dir = "uploads/";

                move_uploaded_file($image_temp, $upload_dir . $image_name);
            }

            $sql = "INSERT INTO vijesti (title, about, content, category, image, archive) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $title, $about, $content, $category, $image_name, $archive);

            if ($stmt->execute()) {
                echo "<u><b>$category</u></b></p>";
                echo "<p><b>$title</b></p>";
                echo "<p>$about</p>";
                echo "<p>$content</p>";
                if ($image_name) {
                    echo "<p><img src='uploads/$image_name' alt='Slika'></p>";
                }
            } 

            $stmt->close();
        } 
    } 

    $conn->close();
    ?>
    </div>
</main>
<footer>
    <h1>Frankfurter Allgemeiner</h1>
</footer>
</body>
</html>
