<html>
<head><link href="css.css" rel="stylesheet" type="text/css"></head>
<body>
    <div id="top">
        <img src="logo.png" width="5%" height="8%">
    </div>
    <?php
    session_id("main");
    session_start();
        if(isset ($_SESSION ['user'])){
            $conn=new mysqli("","","","my_dtecommerce");
            if($conn->connect_error){
                die("Fission Mailed: ".$conn->connect_error);
            }
            echo '<div class="topnav">
            <a href="carrello.php">Carrello</a>';
            
            
            if($_SESSION['sts']==1){
                echo '<a href="aggiungiprod.php"> Aggiungi un prodotto </a>';
                echo '<a href="eliminaprod.php"> Elimina un prodotto </a>';
            }

            echo'<a href="index.html">Esci</a>';
            echo'</div>';
            $sql="SELECT * FROM prodotto";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                echo '<form action="aggiungi.php" method="post">';
                while($row=$result->fetch_assoc()){
                    
                    echo '<table>';
                    echo'<tr width="100%">';
                    echo '<td width="15%"><img width="200px" height="145px" src="'.$row["link"].'"></td>'.'<td  width="15%">'.$row["nome"].'</td><td width="35%">'.$row["descrizione"].'|</td><td  width="5%">'.$row["qta_disponibile"].'</td><td width="5%">€'.$row["prezzo"].'</td><td>'.'<button class="bottone" type="submit" name="prod" value="'.$row["id"].'"><span>Aggiungi al carrello</span></button>'.'</td></tr>';
                    echo '</table>';

                }
                echo '</form>';
                
            }
                

        }
        else{
            echo "non sei loggato"."</br>";
            echo '<a href="index.html">LOGGATI</a></br>';
        }
    ?>
</body>
</html>