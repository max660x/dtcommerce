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
                    $sql="DELETE FROM carrello WHERE id='".$_POST["prod"]."' AND user='".$_SESSION['user']."'";
                    $result=$conn->query($sql);
                    header("location: carrello.php");
                }
                else{
                    echo "non sei loggato"."</br>";
                    echo '<a href="index.html">LOGGATI</a></br>';
                }
            ?>
        </body>
        </html>
