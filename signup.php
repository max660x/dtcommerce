<html>
<head>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form method="POST" action="signup.php">
    <table>
    <tr><td>user:</td><td style="width: 500px"><input type="text" name="user" style="position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
    <tr><td> password:</td><td style="width: 500px"><input type="text" name="psw" style="position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
    <tr><td> E-Mail</td><td style="width: 500px"><input type="text" name="data" style="position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
    <tr><td> <input type="submit"></td></tr>
    </table>
        </form>
        <?php
                        error_reporting(0);
                        $conn=new mysqli("","","","my_dtecommerce");
                        if($conn->connect_error){
                            die("Fission Mailed: ".$conn->connect_error);
                        }
                        
                        $user=$_POST["user"];
                        $psw=$_POST["psw"];
                        $dati=$_POST["data"];

                        if($user!=""&&$psw!=""){
                                if($dati=="sabba"){
                                    $sql="INSERT INTO user (user,psw,dati,ad)
                                      VALUES ('".$user."','".$psw."','".$dati."',1)";
                                    if ($conn->query($sql)=== TRUE){
                                        echo "Registrato";
                                    }
                                    else{
                                    echo "</br>"."errore: " . $conn->error;
                                    }
                                }
                                else{
                                $sql="INSERT INTO user (user,psw,dati,ad)
                                      VALUES ('".$user."','".$psw."','".$dati."',0)";
                                if ($conn->query($sql)=== TRUE){
                                    echo "Registrato";
                                }
                                else{
                                    echo "</br>"."errore: " . $conn->error;
                                }
                            }
                        }
        ?>
        <a href="index.html">LOGIN</a></br>
</body>
</html>