
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body style="background-color:powderblue;">
    <h2>Guardian Information</h2>
    <br>
    <form method="POST" action="registration.php">
        Guardian name : <input type="text" name="Guardian_Name" />
        Contact Number:<input type="text" name="Guardian_Contact"  /><br /><br><br>
        CNIC Number:<input type="text" name="Guardian_CNIC"  />
        Address:<input type="address" name="Guardian_Address"  /><br /><br>
        <p>Gender:</p>
        <input type="radio" name="gender" value="male" /> Male<br />
        <input type="radio" name="gender" value="female" /> Female<br />
        Relation:<input type="text" name="Relation"  /><br /><br>
        <input type="Submit" name="submit" value="Submit">
        <hr>
</body>
</html>
