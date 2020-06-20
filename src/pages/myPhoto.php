<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('../../configure/travel_info.php');
echo $_SESSION['username'];
?>
<head>
    <meta charset="UTF-8">
    <title>TravelShare:MyPhoto</title>
    <link rel="stylesheet" type="text/css" href="../styles/top.css">
    <link rel="stylesheet" type="text/css" href="../styles/myPhoto.css">
    <link rel="stylesheet" type="text/css" href="../styles/foot.css">
    <link rel="stylesheet" type="text/css" href="../styles/pagination.css">
</head>
<body onresize="changed()">

<header id="header">
    <nav class="navigation">
        <ul>
            <li><img src="../../decoration-images/img1/cartoon.jpg"></li>
            <li><a href="homePage.php">Home</a></li>
            <li><a href="browsePage.php">Browse</a></li>
            <li><a href="searchPage.html">Search</a></li>
        </ul>
    </nav>
    <div class="dropdown">
        <button id="account">My account</button>
        <div class="dropdown-content">
            <a href="uploadedPage.html"><img src="../../decoration-images/icons/upload.png">upload</a>
            <a href="myPhoto.php" class="active"><img src="../../decoration-images/icons/photo.png">my photos</a>
            <a href="likePage.php"><img src="../../decoration-images/icons/like.png">like</a>
            <a href="logOut.php"><img src="../../decoration-images/icons/logout.png">log out</a>
        </div>
    </div>
</header>
<?php
include_once('imageTools.php');
$UID = getUIDFromNAME($_SESSION['username']);
function getMyPhoto(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM travelimage WHERE UID=:userID';
    $statement=$pdo->prepare($sql);
    global $UID;
    $statement->bindValue(':userID',$UID);
    $statement->execute();
    return $statement;
}

function deletePhoto($ImageID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM travelimage WHERE ImageID=:imageID';
    $statement=$pdo->prepare($sql);
    global $UID;
    $statement->bindValue(':imageID',$ImageID);
    $statement->execute();
}//再加js的函数和事件处理器

?>
<main>
    <table class="myPhotos">
        <tr class="tableTitle">
            <td>My Photo</td>
        </tr>
        <?php
        $statement = getMyPhoto();
        while ($item=$statement->fetch()){

            echo '<tr><td>
            <a href="picture.php?ImageID='.$item['ImageID'].'"><img src="../../travel-images/medium/'.$item['PATH'].'"></a>
            <table>
                <tr>
                    <td class="photoName">'.$item['Title'].'</td>
                </tr>
                <tr>
                    <td class="introduction">'.$item['Description'].'</td>
                </tr>
                <tr>
                    <td>
                        <a href="picture.html"><button class="modifyButton" onclick="alert(\'modified\')">Modify</button></a>
                        <button class="deleteButton" onclick="solveDelete('.$item['ImageID'].')">Delete</button>
                    </td>
                </tr>
            </table>
            </td></tr>';

        }
        ?>
    </table>
    <div class="pagination">
        <ul>
            <li><a href="../../index.html">«</a></li>
            <li><a class="active" href="myPhoto.html">首</a></li>
            <li><a href="myPhoto.html">2</a></li>
            <li><a href="myPhoto.html">3</a></li>
            <li><a href="myPhoto.html">4</a></li>
            <li><a href="myPhoto.html">5</a></li>
            <li><a href="myPhoto.html">6</a></li>
            <li><a href="myPhoto.html">尾</a></li>
            <li><a href="myPhoto.html">»</a></li>
        </ul>
    </div>
</main>
<footer id="normalFoot">
    This is the first web by Little JiangJiang. Wish you best!
</footer>
</body>
</html>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/foot.js"></script>
<?php
$name = 'ImageID';
//if(isset($_POST['ImageID'])){
//    deletePhoto($_POST['ImageID']);
//}
?>
<script>
    function solveDelete(imageID) {
        $.ajax(
            {
                url:'myPhoto.php',
                type:"POST",
                data:{
                    ImageID:imageID
                },
                async:false
            }
        )
        <?php
        if(isset($_POST['ImageID'])){
            deletePhoto($_POST['ImageID']);
        }
        ?>
    }
</script>
<!--alert(--><?php //echo $_GET('ImageID')?><!--);-->
<!--        --><?php //deletePhoto($_GET('ImageID'));?>
<?php //deletePhoto($_POST('ImageID'));?>
