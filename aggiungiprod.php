<html>
<head>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="top">
        <img src="logo.png" width="6%" height="8%">
    </div>
    <div class="topnav">
        <a href="main.php"> Home </a>
        <a href="carrello.php"> Carrello </a>
        <a href="eliminaprod.php"> Elimina un prodotto </a>
    </div>
    </br>
    <form method="POST" action="aggiungiprod.php">
        <table>
            <tr><td>nome:</td><td style="width: 500px"><input type="text" name="nome" style=" height:5%; width:100%; position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
            <tr><td>descrizione:</td><td style="width: 500px"><input type="text" name="descrizione" style=" height:5%; width:100%; position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
            <tr><td>qta:</td><td style="width: 500px"><input type="text" name="qta" style=" height:5%; width:100%; position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
            <tr><td>prezzo:</td><td style="width: 500px"><input type="text" name="prezzo" style=" height:5%; width:100%; position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
            <tr><td>link:</td><td style="width: 500px"><input type="text" name="link" style=" height:5%; width:100%; position:relative; border:1px solid #ff8800;background: #fa8e00;border-radius:15px; cursor: pointer;background-color:#ffbf5e;;color:#ffffff;"></td></tr>
            <tr><td><input type="submit"></td></tr>
        </table>
        </form>
        <?php
                        session_id("main");
                        session_start();
                            if(isset ($_SESSION ['user'])){
                        $conn=new mysqli("","","","my_dtecommerce");
                        if($conn->connect_error){
                            die("Fission Mailed: ".$conn->connect_error);
                        }
                        $id=rand(0,999999);
                        $nome=$_POST["nome"];
                        $descrizione=$_POST["descrizione"];
                        $qta=$_POST["qta"];
                        $prezzo=$_POST["prezzo"];
                        $link=$_POST["link"];

                        if($nome!=""&&$prezzo!=""&&$link!=""){
                            $sql="INSERT INTO prodotto (id,nome,descrizione,qta_disponibile,prezzo,link)
                            VALUES ('".$id."','".$nome."','".$descrizione."','".$qta."','".$prezzo."','".$link."')";
                            if ($conn->query($sql)=== TRUE){
                                echo "Prodotto Registrato";
                            }
                            else{
                                echo "</br>"."errore: " . $conn->error;
                            }
                        }

                    }
                    
                
?>
</body>
</html>