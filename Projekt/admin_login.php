<?php
    //Variablendeklaration
//    $eingabeusername = $_POST["name"];                  //Formulareingabe des Benuternamens
//    $eingabepassword = $_POST["password"];              //Formulareingabe des Passworts
//    $db = mysqli_connect("", "root", "", "benutzer");   //Verbindung zur Datenbank; Datenbankname = "benutzer"

    if(!$db)                                                    //Abfrage: Verbindung zur Datenbank?
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());     //Fehlermeldung, wenn keine Verbindung möglich
    }
    else
    {
        echo '<table border="1">';
        echo '<tr>';
        echo '<td width=\"100\" bgcolor= \"#E6E6FA\"><b>Benutzername</b></td>';
        echo '<td width=\"100\" bgcolor= \"#E6E6FA\"><b>Passwort</b></td>';
        echo '<td width=\"100\" bgcolor= \"#E6E6FA\"><b>Zugriff</b></td>';
        echo '</tr>';
        $namepruefen = "SELECT * FROM personen";    //Abfrage: Name in Datenbank suchen        
            $pruefung = mysqli_query($db, $namepruefen);        
            while ($zeiledb = mysqli_fetch_array($pruefung))
            {   
                echo "<tr>";
                echo "<td width=\"100\">". $zeiledb['Name'] . "</td>";
                echo "<td width=\"100\">". $zeiledb['Passwort'] . "</td>";
                if ($zeiledb['Zugriff']==1)
                {
                    echo "<td width=\"100\">Ja</td>";
                }
                else
                {
                    echo "<td width=\"100\">Nein</td>";
                }
                echo "</tr>";
            }   
        echo "</table>";  
    } 
?>