<html>
<head>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
    <body>
    <div id="top">
        <img src="logo.png" width="6%" height="8%">
    </div>
        <?php
            error_reporting(0);
            session_id("main");
            session_start();
                if(isset ($_SESSION ['user'])){
                    $conn=new mysqli("","","","my_dtecommerce");
                    if($conn->connect_error){
                        die("Fission Mailed: ".$conn->connect_error);
                    }
                    $del=$_POST["prod"];
                    if($del==""){
                        echo '<div class="topnav">
                        <a href="main.php">Home</a>'.'<a href="index.html">Esci</a></div>';
                        $sql="SELECT * FROM prodotto";
                        $result=$conn->query($sql);
                        if($result->num_rows > 0){
                            echo '<form action="eliminaprod.php" method="post">';
                            while($row=$result->fetch_assoc()){
                                echo '<table>';
                                echo'<tr width="100%">';
                                echo '<td width="15%"><img width="200px" height="145px" src="'.$row["link"].'"></td>'.'<td  width="15%">'.$row["nome"].'</td><td width="35%">'.$row["descrizione"].'|</td><td  width="5%">'.$row["qta_disponibile"].'</td><td width="5%">'.$row["prezzo"].'</td><td>'.'<button class="bottone" type="submit" name="prod" value="'.$row["id"].'"><span>Elimina il prodotto</span></button>'.'</td></tr>';
                                echo '</table>';
                            }
                            echo '</form>';
                        }
                    }
                    else{
                        $sql="DELETE FROM prodotto WHERE id='".$del."'";
                        $result=$conn->query($sql);
                        echo 'prodotto eliminato';
                        header("location: eliminaprod.php");
                    }
                }
            else{
                echo "non sei loggato"."</br>";
                echo '<a href="index.html">LOGGATI</a></br>';
            }

                    ?>
</body>
</html>