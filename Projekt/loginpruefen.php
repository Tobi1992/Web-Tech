<?php
    //Variablendeklaration
    $eingabeusername = $_POST["name"];                  //Formulareingabe des Benuternamens
    $eingabepassword = $_POST["password"];              //Formulareingabe des Passworts
    $db = mysqli_connect("", "root", "", "benutzer");   //Verbindung zur Datenbank; Datenbankname = "benutzer"

    if(!$db)                                                    //Abfrage: Verbindung zur Datenbank?
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());     //Fehlermeldung, wenn keine Verbindung möglich
    }
    else
    {
    //    echo 'Verbindung erfolgreich: ';
        $namepruefen = "SELECT * FROM personen WHERE Name = '".$eingabeusername."'";    //Abfrage: Name in Datenbank suchen
        $pruefung = mysqli_query($db, $namepruefen);                                    
    //    echo '<table border="1">';
        $zeiledb = mysqli_fetch_array($pruefung);                                //Ergebnis in Variable schreiben
    //        echo "<tr>";
    //        echo "<td>". $zeiledb['Name'] . "</td>";
    //        echo "<td>". $zeiledb['Passwort'] . "</td>";
    //        echo "</tr>";
        $passworddb = $zeiledb['Passwort'];                                        
    //    echo "</table>";        
    }
    //    echo $eingabepassword;
    //    echo $eingabeusername;
    //    echo $passworddb;
        
    if ($eingabepassword!==$passworddb)                     //Überprüfung: Eingabepasswort ungleich Passwort aus Datenbank?
        {
            echo 'Falsches Passwort!';                      //Fehlermeldung
        }
        else
        {
            echo "Hallo " .$eingabeusername. "!<br />";           //Meldung an Benutzer
            if ($eingabeusername=='admin')
            {
                include 'admin_login.php';
            }
        }
    mysqli_close($db);                                      //Datenbankverbindung schließen                                      
?>