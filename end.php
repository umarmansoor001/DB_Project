<?php  // creating a database connection 

    $server="localhost";
    $login="root";
    $password="";
    $db="hamareybachchey";
    $con = mysqli_connect($server,$login,$password,$db);

    if(mysqli_connect_error())
    {
        echo "Connection failed ";
        exit();
    }
    //when button pressed then this part runs
    if(isset($_POST["fee_paid"]))
    {
        $amount=$_POST["fee"];

        //making of query to insert student's data into student table
        $query="UPDATE account SET paid = 1, paid_date=now() WHERE challanNo IN (SELECT challanNo FROM(SELECT challanNo FROM account ORDER BY challanNo DESC LIMIT 1) AS t);";
        //setting data into student's tables
        mysqli_query($con,$query);
    }


    echo "<html>";
    echo "<body>";
    echo "<body style='background-color:powderblue;'>";
    echo "<h1>You Have been Registered Successfully!</h1>";
    echo "</body>";
    echo "</html>";
    ?>