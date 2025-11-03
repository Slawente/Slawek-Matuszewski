<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "piekarnia");
    $q1 = "SELECT Rodzaj, Nazwa, Gramatura, Cena from wyroby WHERE Rodzaj = 'INNE'";
    $q2 = "SELECT DISTINCT Rodzaj from wyroby ORDER BY Rodzaj DESC";
    $q3 = "SELECT ID, Nazwa from wyroby WHERE Nazwa LIKE='%Chałka%'";
    $q4 = "SELECT Rodzaj, ROUND(AVG(Cena), 2) AS 'Średnia cena' from wyroby GROUP BY Rodzaj";
    $result = mysqli_query($conn, $q2);


    mysqli_close($conn);
    ?>
</body>
</html>