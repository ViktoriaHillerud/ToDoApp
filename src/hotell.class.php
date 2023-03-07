<?php
Class Hotell {
    private $servername = "db";
    private $username = "root";
    private $password = "example";
    private $db = "cleaner_company";
    private $conn;


    function __construct() {
        $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db,$this->username,$this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    function getData($id = "")
    {
        if($id == "")
        {   
            $stmt = $this->conn->query("SELECT * FROM lägenhet");
            $row = $stmt->fetchAll();
            return $row;
        }
        else
        {
            $stmt = $this->conn->prepare("SELECT * FROM lägenhet WHERE rumsnr = :rumsnr");
            $stmt->bindParam(':rumsnr', $id);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        }
    }

    function createData($rumsnr, $kvm, $datum) 
    {
        if($rumsnr == "")
        {
            echo "Ett eller flera fält var tomma, försök igen.";
            return false;
        }

        $stmt = $this->conn->prepare("INSERT INTO lägenhet (rumsnr, kvm, datum)
        VALUES (:rumsnr, :kvm, :datum)");
        $stmt->bindParam(':rumsnr', $rumsnr);
        $stmt->bindParam(':kvm', $kvm);
        $stmt->bindParam(':datum', $datum);
        if($stmt->execute())
        {
            echo "En ny lägenhet har lagts till. Nummer: ".$rumsnr."<br>";
        }
        else
        {
            echo "Ojdå! Något har blivit fel. Kontakta helpdesk.<br>";
        }
    }

    function done($rumsnr)
    {
        $stmt = $this->conn->prepare("UPDATE lägenhet SET cleaning_done = 1
        WHERE rumsnr = :rumsnr");
        $stmt->bindParam(':rumsnr', $rumsnr); 
       $stmt->execute();
           
       
    }

    function notdone($rumsnr)
    {
        $stmt = $this->conn->prepare("UPDATE lägenhet SET cleaning_done = 0
        WHERE rumsnr = :rumsnr");
        $stmt->bindParam(':rumsnr', $rumsnr); 
        $stmt->execute();
        
    }


    function updateData($rumsnr, $kvm, $datum)
    {
        if($rumsnr == "")
        {
            echo "Inget ID angett, vänligen försök igen!<br>";
            return false;
        }

        $stmt = $this->conn->prepare("UPDATE lägenhet SET kvm = :kvm, datum = :datum
        WHERE rumsnr = :rumsnr");
        $stmt->bindParam(':rumsnr', $rumsnr); 
        $stmt->bindParam(':kvm', $kvm);
        $stmt->bindParam(':datum', $datum);

        if($stmt->execute())
        {
            echo "Lägenheten har uppdaterats!<br>";
        }
        else
        {
            echo "Något är fel!<br>";
        }
    }

    function deleteData($rumsnr)
    {
        if($rumsnr == "")
        {
            echo "Inget rumsnummer angett, vänligen försök igen!<br>";
            return false;
        }
        else
        {
            $stmt = $this->conn->prepare("DELETE FROM lägenhet WHERE rumsnr = :rumsnr");
            $stmt->bindParam(':rumsnr', $rumsnr);
            if($stmt->execute())
            {
                echo "Lägenhet borttagen.<br>";
            }
            else
            {
                echo "Obs! Något har blivit fel. Kontakta administratören omgående!<br>";
            }
        }
    }






}



?>
