<!Doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <!--die untere Zeile bewirkt, dass die index-Seite bei Google nicht gelistet wird-->
   
    <meta name="robots" content="noindex">
    <!--die untere Ziele legt fest, welcher Bereich des Webauftritt tatsächlich sichtbar sein soll
    Erklärung von Schlüsselbegriffen: 
    
        - initial-scale=1.0, maximum-scale=1.1 - 
    
    -> bedeutet, dass an einem Smartphone
    die angezeigten Daten auf 10% herangezoomt werden können.

    -> ist das nicht gewünscht, so muss das "maximum-scale=1.1" raus gelassen werden und bei 
    
        - user-scalable -

    no angegeben werden
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.1, user-scalable=yes">
    
    <!--die untere Zeile dient zur Beschrebung der aktuellen Webseite-->
    <meta name="description" content="Das ist die index.html-Datei vom Kurs.">
    <link rel="stylesheet" href="css/allgemeinerStyle.css">
    <link rel="stylesheet" href="css/loeschen.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet"> 
    <title>Passwort-Management-System</title> 
</head>
<body>
    <div class="header">
    <a href="index.php"><img src="images/schluessel.png" width="180px" height="50px"></a>
        <h1>PMS</h1>
    </div>
    <div class="hauptteil">
    <?php include 'include/menuleiste.php'?>
        <div class="inhalt">
            <div class="datenverarbeitung">
                <div class="datenloeschung">
                <?php include 'include/datenfelder_loeschen.php';?>
                <div class="datenverarbeitung_hinweisText">
                        <!--PHP-Datenverarbeitung-Anfang-->
                        <?php
                        require_once 'datenbankverbindung/verbindung.php';

                        $_anbieter = $_POST['anbieter'];
                            
                        if($_anbieter==null){
                        echo "<br><p>Das Feld darf nicht leer bleiben.";
                        }else{
                            $result = $con->query("SELECT anbieter FROM `login` WHERE anbieter LIKE '{$_anbieter}'");
                            $eintrag = $result->fetch_assoc();
                            if($eintrag==null){
                                echo "<br><p>Keinen passenden Datenbankeintrag gefunden.</p>";
                            }else{
                                $result = $con->query("DELETE FROM `login` WHERE anbieter LIKE '{$_anbieter}'");
                                if($result==true){
                                    echo "<br><p>Die Datenlöschung war erfolgreich.</p>";
                                }else{
                                    echo "<br><p>Die Daten konnten nicht entfernt werden.</p>" .$con->error;
                                }
                            $con->close();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="footer"></div>
</body>
</html>
