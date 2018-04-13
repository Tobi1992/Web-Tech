<?php                                                   //Neuregistrierung eines Benutzers
    
    $eingabeusername = $_POST["name"];                  //Formulareingabe des Benuternamens
    $eingabepassword = $_POST["password"];              //Formulareingabe des Passworts
    $db = mysqli_connect("", "root", "", "benutzer");   //Verbindung zur Datenbank; Datenbankname = "benutzer"
    
    if(!$db)                                                   //Abfrage: Verbindung zur Datenbank?
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());     //Fehlermeldung, wenn keine Verbindung möglich
    }
    else
    {
//    echo 'Verbindung erfolgreich: ';
        $namepruefen = "SELECT * FROM personen WHERE Name = '".$eingabeusername."'";    //Abfrage: Name in Datenbank suchen
        $pruefung = mysqli_query($db, $namepruefen);
        $zeiledb = mysqli_fetch_array($pruefung);                                       //Ergebnis in Variable schreiben
        $namedb = $zeiledb['Name'];
            if ($eingabeusername!==$namedb and !empty($eingabeusername) and  !empty($eingabepassword))                          //Überprüfung: Name nicht in Datenbank? Feld im Formular nicht leer? Passwort nicht leer?
            {
                $eintrag = "INSERT INTO personen(Name, Passwort, Zugriff) VALUES ('" .$eingabeusername. "','" .$eingabepassword. "','0')";   //Neuer Eintrag in Datenbank
                mysqli_query($db, $eintrag);  
                echo 'Benutzer hinzugef&uuml;gt!';                                                                              //Rückmeldung
            }
            else                                                                                                                //Fehlermeldungen bei:
            {         
                if (empty($eingabeusername))                                                                                    //leeres Formularfeld Name
                {
                    echo 'Benutzername muss angegeben werden!'."<br />";
                }
                if (empty($eingabepassword))                                                                                    //leeres Formularfeld Passwort
                {
                    echo 'Passwort wurde nicht gesetzt!."<br />"';
                }
                if  ($eingabeusername==$namedb and !empty($eingabeusername))                                                    //Benutzer schon vorhanden
                {
                echo 'Benutzername ist schon vergeben!'."<br />";    
                }
            }
    }
    mysqli_close($db);      //Datenbankverbindung schließen
?>