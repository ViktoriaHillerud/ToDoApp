<?php
if($_POST["name"] == "chefen" &&  $_POST["password"] == "1234") {
    header('Location: hotellchas.php');
}
else {

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lägenheter i Hotell Chas</title>
    <link href="hotell.css" rel="stylesheet"/>
</head>
<body id="loginbody">
<section id="loginsect">
    <header>
        <h1>Cleaner Company AB</h1>
        <h1>Fel uppgifter!</h1>
    </header>

    <main>
    
    <a href='loginchas.php'>Försök igen</a>
        

    </main>
</section>
</body>
</html>

<?php
    
}
?>


