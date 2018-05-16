<!DOCTYPE html>
<html >

<head>

 
    <title>online bidding system</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rating.js"></script
</head>

<body><?php include('nav.php');
require("dbConnection.php");
$ctrl = true;
$userSEI = $_SESSION['user_id']; 
if (isset($_GET["user"])) {
    $ctrl = false;
}

</body>

</html>