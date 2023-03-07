<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lägenheter i Hotell Chas</title>
    <link href="hotell.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Cleaner Company AB</h1>
        <h1>"Hotell Chas"</h1>
    </header>

<?php
include('hotell.class.php');
error_reporting(0);

$conn = new Hotell();


if($_GET["view"] == "add")
{
    echo "<a href='hotellchas.php'>Tillbaka - </a>";

    if($_GET["action"] == "addapart")
    {
        $conn->createData($_GET["rumsnr"],$_GET["kvm"],$_GET["datum"]);
    }


    else
    {
?>
    <form method="get" action="hotellchas.php">
            rumsnr: <input type="text" name="rumsnr"><br>
            kvm: <input type="text" name="kvm"><br>
            datum: <input type="text" name="datum"><br>
            <input type="hidden" name="view" value="add">
            <input type="hidden" name="action" value="addapart">
        <input id="formbtn" type="submit" value="Lägg till lägenhet">
    </form>
<?php
    }
}

else if($_GET["view"] == "update")
{
    echo "<h2><a href='hotellchas.php'>Tillbaka - </a> Uppdatera lägenhet</h2>";

    if($_GET["action"] == "updateapartment")
    {
        $conn->updateData($_GET["rumsnr"],$_GET["kvm"],$_GET["datum"]);
    }
    else
    {
        $rows = $conn->getData($_GET["rumsnr"]);

        foreach($rows as $r)
        {
            echo '<form method="get" action="hotellchas.php">';
            echo 'Rumsnummer: <input type="text" name="rumsnr" value="'.$r["rumsnr"].'"><br>';
            echo 'Kvm: <input type="text" name="kvm" value="'.$r["kvm"].'"><br>';
            echo 'Datum: <input type="text" name="datum" value="'.$r["datum"].'"><br>';
        }

        echo '<input type="hidden" name="view" value="update">
                <input type="hidden" name="action" value="updateapartment">
                <input type="hidden" name="rumsnr" value="'.$_GET["rumsnr"].'">
                <input id="formbtn" type="submit" value="Uppdatera lägenhet">
                </form>';
    }
}
else if($_GET["view"] == "delete")
{
    echo "<h2><a href='hotellchas.php'>Tillbaka - </a> Radera lägenhet</h2>";

    $conn->deleteData($_GET["rumsnr"]);
}

else if ($_GET["submit"] == "Städad")
{
    $conn->done($_GET["rumsnr"]);
    echo "<h2><a href='hotellchas.php'>Tillbaka - </a>Lägenheten färdigstädad!</h2>";
}

else if ($_GET["submit"] == "Ej klar")
{
    $conn->notdone($_GET["rumsnr"]);
    echo "<h2><a href='hotellchas.php'>Tillbaka - </a>Lägenheten skall städas!</h2>";

}

else {
    $rows = $conn->getData();

    echo "<h2>Lägenheter att städa</h2>";

            echo "<table border='1'>
                    <th>rumsnr</th>
                    <th>kvm</th>
                    <th>datum</th>
                    <th> </th>";
        
            foreach ($rows as $r) {
                echo "
                    <tr>
                        <td>".$r["rumsnr"]."</td>
                        <td>".$r["kvm"]."</td>
                        <td>".$r["datum"]."</td>
                        <td>
                        <a href='hotellchas.php?view=update&rumsnr=".$r["rumsnr"]."'>Uppdatera</a>
                        -
                        <a href='hotellchas.php?view=delete&rumsnr=".$r["rumsnr"]."'>Ta bort</a>
                        
                        <p id='checkdone'> " .  ($r["cleaning_done"] == 1 ? "Färdig" : "Ska städas") . " </p>
                        <form method='GET' action='hotellchas.php'>
                        <input id='done' type='submit' name='submit' value='Städad'>
                        <input type='hidden' name='rumsnr' value='".$r["rumsnr"]."'>
                        </form><br>
                        <form method='GET' action='hotellchas.php'>
                        <input id='notdone' type='submit' name='submit' value='Ej klar'>
                        <input type='hidden' name='rumsnr' value='".$r["rumsnr"]."'>
                        </form>
                        </td>
                    </tr>";

            
            }
            
       
            echo "</table>";
            echo "<a id='bottom' href='hotellchas.php?view=add'>Lägg till lägenhet</a><br>";
            echo "<a id='bottom' href='loginchas.php'>Logga ut</a>";

}

?>


</body>
</html>

