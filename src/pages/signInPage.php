<!DOCTYPE html>]
<html lang="en">
<?php
session_start();

//$_SERVER['REQUEST_METHOD'] = 'POST';
//$_SESSION['username'] = null;
function validLogin(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //very simple (and insecure) check of valid credentials.
    $sql = "SELECT * FROM traveluser WHERE Username=:user and Pass=:pass";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user',$_POST['username']);
    $statement->bindValue(':pass',$_POST['password']);
    echo $_POST['username'].$_POST['password'];
    $statement->execute();
    if($statement->rowCount()>0){
        $_SESSION['username'] = $_POST['username'];
        echo "valid";
        return true;
    }
    return false;
}

?>
<head>
    <meta charset="UTF-8">
    <title>Home:TravelShare</title>
    <link rel="stylesheet" type="text/css" href="../../src/styles/signin.css">
    <link rel="stylesheet" type="text/css" href="../../src/styles/foot.css">

</head>

<body onresize="changed()">
<?php
function getLoginTable(){
    return'<main>
<div class="signIn">
    <div class="cartoonPhoto">
        <img src="../../decoration-images/img1/cartoonIndex.jpg">
        <div>sign in for JiangJiang</div>
    </div>
    <form class="signInForm" action="signInPage.php" method="post" role="form">
        <div class="cue">Username:</div>
        <input type="text" name="username"><br>
        <div class="cue">Password:</div>
        <input type="password" name="password"><br>
        
        <button><a href="" class="signInBtn" type="button" onclick="">sign in</a></button>
    </form>
    <div>
New to JiangJiang?
        <a href="../../src/pages/signUpPage.html" class="signUpBtn">Create a new account</a>
    </div>
</div>
</main>
<footer id="normalFoot">
    <p>This is the first web by Little JiangJiang. Wish you best!</p>
</footer>';
}

function get_current_url(){
    $current_url='http://';
    if(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'){
        $current_url='https://';
    }
    if($_SERVER['SERVER_PORT']!='80'){
        $current_url.=$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    }else{
        $current_url.=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
    return $current_url;
}

?>


<?php
//$_SESSION['username'] = null;
if(!isset($_SESSION['username'])){
    echo getLoginTable();
}else{
//    echo "you have signed in";
//    echo get_current_url()."\n";
//    echo $_SERVER['REQUEST_URI'];
    echo "hello";
    header("location:homePage.php");
}

?>

<?php
require_once("../../configure/travel_info.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "here";
    if (validLogin()) {
        $_SESSION['username'] = $_POST['username'];
        echo "helloWorld";
        header("location:homePage.php");
    } else {
        echo "<p class='wrongLogin'>您输入的账号或密码错误！</p>";
    }
}
?>

</body>
</html>

<script src="../../src/js/jquery-3.3.1.js"></script>
<script src="../../src/js/jquery-3.3.1.min.js"></script>
<script src="../../src/js/foot.js"></script>