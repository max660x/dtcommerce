<html>
    <body>
        <?php
            session_id("main");
            session_start();
                if(isset ($_SESSION ['user'])){
                    $conn=new mysqli("","","","my_dtecommerce");
                    if($conn->connect_error){
                        die("Fission Mailed: ".$conn->connect_error);
                    }
                    $sql="SELECT prodotto.nome,prodotto.qta_disponibile,prodotto.prezzo,carrello.id FROM carrello inner join prodotto on carrello.cod_p=prodotto.id where carrello.user='".$_SESSION['user']."' ";
                    $result=$conn->query($sql);
                    if($result->num_rows > 0){
                        echo '<form action="elimina.php" method="post">';
                        echo '<table border="1px">';
                        echo'<tr><td>nome</td><td>qta disponibile</td><td>prezzo unitario</td></tr>';
                        while($row=$result->fetch_assoc()){
                           echo '<tr><td  width="15%">'.$row["nome"].'</td><td  width="5%">'.$row["qta_disponibile"].'</td><td width="5%">'.$row["prezzo"].'</td></tr>';
                            $soldi=$row["prezzo"]+$soldi;
                        }
                        
                        echo '<tr>'.'Importo Totale: '.$soldi.'&€;'.'</tr>'; 
                        echo '</table>';
                        $sql="DELETE FROM carrello WHERE user='".$_SESSION['user']."'";
                        $result=$conn->query($sql);
                    }
                    echo'<a href=main.php>Torna alla HomePage</a>';
                }
                else{
                    echo "non sei loggato"."</br>";
                    echo '<a href="index.html">LOGGATI</a></br>';
                }
            ?>
    </body>
</html>
