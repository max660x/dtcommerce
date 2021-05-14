<html>
<head>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        session_id("main");
        session_start();
        $conn=new mysqli("","","","my_dtecommerce");
        if($conn->connect_error){
            die("Fission Mailed: ".$conn->connect_error);
        }
        if($_POST["usr"]!=""&&$_POST["psw"]!=""){
        $sql=" SELECT user,psw,id,ad FROM user WHERE user= '".$_POST["usr"]."' AND psw='".$_POST["psw"]."' ";
        $res=$conn->query($sql);
        $row=$res->fetch_assoc();
        if($res->num_rows > 0){
            $_SESSION['user']=$_POST["usr"];
            $_SESSION['sts']=$row["ad"];
            header('Location:main.php');
            exit();
        }
        else{
            echo "vuoi registrarti?"."</br>";
            echo '<a href="signup.php">Registrazione</a></br>';
            echo '<a href="index.html">Esci</a></br>';
            }
        }
        else{
            echo "NON HAI INSERITO NULLA vuoi registrarti?";
            echo '<a href="signup.php">Registrazione</a></br>';
            echo '<a href="index.html">Esci</a></br>';
        }
    ?>
</body>
</html>