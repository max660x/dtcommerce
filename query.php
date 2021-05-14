<html>
<head><link href="css.css" rel="stylesheet" type="text/css"></head>
<body>
    <form action="query.php" method="post">
    <input type="text" name="query">
    </form>
        <?php
        $conn=new mysqli("","","","my_dtecommerce");
        if($conn->connect_error){
            die("Fission Mailed: ".$conn->connect_error);
        }
        $sql=$_POST["query"];
        $result=$conn->query($sql);
        var_dump($result);
        ?>
        </body></html>