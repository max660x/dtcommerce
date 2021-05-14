<html>
<head>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
    <body>
    <div id="top">
        <img src="logo.png" width="6%" height="8%">
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
                    <a href="main.php">Home</a>'.'<a href="index.html">Esci</a></div>';
                    $sql="SELECT prodotto.link,prodotto.nome,prodotto.descrizione,prodotto.prezzo,carrello.id FROM carrello inner join prodotto on carrello.cod_p=prodotto.id where carrello.user='".$_SESSION['user']."' ";
                    $result=$conn->query($sql);
                    if($result->num_rows > 0){
                        echo '<form action="elimina.php" method="post">';
                        while($row=$result->fetch_assoc()){
                            echo '<table>';
                            echo'<tr width="100%">';
                            echo '<td width="15%"><img width="200px" height="145px" src="'.$row["link"].'"></td>'.'<td  width="15%">'.$row["nome"].'</td><td width="35%">'.$row["descrizione"].'|</td><td  width="5%">'.$row["qta_disponibile"].'</td><td width="5%">'.$row["prezzo"].'</td><td>'.'<button class="bottone" type="submit" name="prod" value="'.$row["id"].'"><span>Elimina dal carrello</span></button>'.'</td></tr>';
                            $soldi=$row["prezzo"]+$soldi;
                            echo '</table>';
                        }
                        echo 'Importo Totale: '.$soldi; 
                        echo '</form><form action="svuota.php" method="post">';
                        echo '<button class="bottone" type="submit" name="svuota">Svuota carrello</button>'.'</br></form>';
                        echo  '<form action="paga.php" method="post"><button class="bottone" type="submit">Acquista</button></form>';
                    }
                    else{
                        echo "carrello vuoto";
                    }


                }
                else{
                    echo "non sei loggato"."</br>";
                    echo '<a href="index.html">LOGGATI</a></br>';
                }

        
        ?>
    </body>
</html>