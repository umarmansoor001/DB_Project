<!-- managing guardian data -->
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
    if(isset($_POST["submit"]))
    {
        //Guardian's data
        $name=$_POST["Guardian_Name"];
        $contact=$_POST["Guardian_Contact"];
        $cnic=$_POST["Guardian_CNIC"];
        $address=$_POST["Guardian_Address"];
        $gender=$_POST["gender"];
        $relation=$_POST["Relation"];

        //making of query to insert student's data into student table
        $query="INSERT INTO `guardian`(G_Name,G_address,G_contactNo,G_cnic,G_gender,G_relationship) VALUES('$name','$address','$contact','$cnic','$gender','$relation');";
       //setting data into student's tables
        mysqli_query($con,$query);
        //Now adding student_id and and guardian_id in care table 
        $query="INSERT INTO care() SELECT student.ID, guardian.G_ID FROM student, guardian WHERE student.ID = (SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AND guardian.G_ID = (SELECT guardian.G_ID FROM guardian ORDER BY guardian.G_ID DESC LIMIT 1);";
        mysqli_query($con,$query);
    }
        $con->close();
    ?>


<!-- managing parents data -->
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
    if(isset($_POST["button_done"]))
    {
        //Mother's data
        $Mname=$_POST["Mother_Name"];
        $Mcontact=$_POST["Mother_Contact"];
        $Mcnic=$_POST["Mother_CNIC"];
        $Memail=$_POST["Mother_Email"];
        $Maddress=$_POST["Mother_Address"];
        //Father's data
        $Fname=$_POST["Father_Name"];
        $Fcontact=$_POST["Father_Contact"];
        $Fcnic=$_POST["Father_CNIC"];
        $Femail=$_POST["Father_Email"];
        $Faddress=$_POST["Father_Address"];

        //making of query to insert student's data into student table
        $query="INSERT INTO `parent`(F_Name,F_address,F_contactNo,F_cnic,F_email,M_Name,M_address,M_contactNo,M_cnic,M_email) VALUES('$Fname','$Faddress','$Fcontact','$Fcnic','$Femail','$Mname','$Maddress','$Mcontact','$Mcnic','$Memail');";
        //setting data into student's tables
        mysqli_query($con,$query);
        //Adding parents key in their respective student's table as foreign key
        $query="UPDATE student SET parent_id=(SELECT P_ID FROM parent ORDER BY P_ID DESC LIMIT 1) WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
        mysqli_query($con,$query);
    }
    //Getting student age to assign class
    $r1=mysqli_query($con,"SELECT * FROM `student` ORDER BY ID DESC LIMIT 1;");
    $student=mysqli_fetch_assoc($r1);
    $r2=mysqli_query($con,"SELECT * FROM `class`");
    //For class 1
    if($student["Age"] >= 3 && $student["Age"] <= 4)
    {
        while($class=mysqli_fetch_assoc($r2))
        {
            if($class["number"]==1 && $class["no_of_students"] < 10 && $class["section"]=="A")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'A') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
            else if($class["number"]==1 && $class["no_of_students"] < 10 && $class["section"]=="B")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'B') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
        }
    }
    //For class 2
    else if($student["Age"] >4  && $student["Age"] <= 6)
    {
        while($class=mysqli_fetch_assoc($r2))
        {
            if($class["number"]==2 && $class["no_of_students"] < 10 && $class["section"]=="A")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'A') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
            else if($class["number"]==2 && $class["no_of_students"] < 10 && $class["section"]=="B")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'B') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
        }
    }
    //For class 3
    else if($student["Age"] >6 && $student["Age"] <=8)
    {
        while($class=mysqli_fetch_assoc($r2))
        {
            if($class["number"]==3 && $class["no_of_students"] < 10 && $class["section"]=="A")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'A') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
            else if($class["number"]==3 && $class["no_of_students"] < 10 && $class["section"]=="B")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'B') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
        }
    }
    //For class 4
    else if($student["Age"] >8 && $student["Age"] <= 10)
    {
        while($class=mysqli_fetch_assoc($r2))
        {
            if($class["number"]==4 && $class["no_of_students"] < 10 && $class["section"]=="A")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'A') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
            else if($class["number"]==4 && $class["no_of_students"] < 10 && $class["section"]=="B")
            {
                
                $query="UPDATE student SET class_id = (SELECT class_ID FROM class WHERE number = 1 AND section = 'B') WHERE ID IN (SELECT ID FROM(SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AS t);";
                mysqli_query($con,$query);
                //incrementing in no of students column for respective student's class
                $query="UPDATE class SET no_of_students = no_of_students + 1 WHERE class.class_ID = (SELECT student.class_id FROM student ORDER BY ID DESC LIMIT 1);";
                mysqli_query($con,$query);
                break;
            }
        }
    }

    //Now adding student_id and course_code in study table 
   //it will add course_code and student_id in study table
    $query="INSERT INTO study() SELECT ID, course.Code FROM student JOIN course ON student.class_id = course.class AND ID = (SELECT ID FROM student ORDER BY ID DESC LIMIT 1);";
    mysqli_query($con,$query);
    $con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
<style>
    h2 {text-align: center;}    
    </style>
</head>
<body>
    <body style="background-color:powderblue;">
    <h2>Student Registration Form</h2>
    <form method="POST" action= "end.php">
    <?php 
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
                    $query="SELECT ID, course.Code, course.class FROM student JOIN course ON student.class_id = course.class AND ID = (SELECT ID FROM student ORDER BY ID DESC LIMIT 1);";
                    $result=mysqli_query($con,$query);
                    $student=mysqli_fetch_assoc($result);
                    $fees=0;
                    $discount=0;
                    $discount_amount=0;
                    if($student["class"]==1)
                    {
                        echo "Fee Amount : Rs.1000";
                        $fees=1000;
                    }
                    else if($student["class"]==2)
                    {
                        echo "Fee Amount : Rs.2000";
                        $fees=2000;
                    }
                    else if($student["class"]==3)
                    {
                        echo "Fee Amount : Rs.3000";
                        $fees=3000;
                    }
                    else if($student["class"]==4)
                    {
                        echo "Fee Amount : Rs.4000";
                        $fees=4000;
                    }
                    else if($student["class"]==5)
                    {
                        echo "Fee Amount : Rs.5000";
                        $fees=5000;
                    }
                    echo "<br><br>";
                    
                    //getting counter of parents from students table
                    $query="SELECT COUNT(*) AS total FROM student WHERE student.parent_id = (SELECT student.parent_id FROM student ORDER BY ID DESC LIMIT 1);";
                    $r1=mysqli_query($con,$query);
                    $s=mysqli_fetch_assoc($r1);
                    //checking if student is child of a NGO staff then discount is 100%
                    $r2=mysqli_query($con,"SELECT cnic FROM staff JOIN parent ON cnic= parent.F_cnic JOIN student ON student.parent_id=parent.P_ID;");
                    $staff=mysqli_fetch_assoc($r2);
                    
                    if($staff["cnic"]=="")
                    {   
                        if($s["total"]>=3)
                        {    
                            echo "Fee Discount : 30% <br>";
                            $discount_amount = (30/100)*$fees;
                            $discount=30;
                            echo "Fee Amount : ".$discount_amount;
                        }
                        else 
                        {
                            echo "NO Fee Discount";
                            $discount=0;
                            $discount_amount=$fees;
                        }
                    }
                    else 
                    {
                        //if child is son of staff member then 100% discount  
                        echo "Fee Discount : 100% <br>"; 
                        echo "Fee Amount : Free";
                        $discount=100;
                        $fees=0;
                        $discount_amount=0;
                    }
                    $id=$student["ID"];
                    $q="INSERT INTO `account` (Amount,Discount,Discounted_amount,Due_date,issue_date,s_id) VALUES('$fees','$discount','$discount_amount',now(),now(),'$id');";
                    //setting data into student's tables
                    mysqli_query($con,$q); 
                   
    ?>
    <br><br>
    Enter amount: <input type="number" name="fee" /><br><br>
    <input type="Submit" name="fee_paid" value="Register">
</body>
</html>



 
     