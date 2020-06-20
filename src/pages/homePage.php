<!DOCTYPE html>
<html lang="en">
<?php

session_start();
//echo "hello";
echo $_SESSION['username'];// ok
include_once('../../configure/travel_info.php')
//$_SESSION['username']=null;
?>

<head>
    <meta charset="UTF-8">
    <title>Home:TravelShare</title>
    <link rel="stylesheet" type="text/css" href="../styles/top.css">
    <link rel="stylesheet" type="text/css" href="../styles/headPhoto.css">
    <link rel="stylesheet" type="text/css" href="../styles/hotExhibit.css">
    <!--    <style>-->
    <!--        .fixed {-->
    <!--            position: fixed;-->
    <!--            bottom: 0;-->
    <!--            left: 100%;-->
    <!--        }-->
    <!--    </style>-->
</head>
<body>
<header id="header">
    <nav class="navigation">
        <ul>
            <li><img src="../../decoration-images/img1/cartoon.jpg"></li>
            <li><a class="active" href="homePage.php">Home</a></li>
            <li><a href="browsePage.php">Browse</a></li>
            <li><a href="searchPage.html">Search</a></li>
        </ul>
    </nav>
    <div class="dropdown">
        <?php
        if($_SESSION['username'] == null){
            echo '<a href="signInPage.php"><button id="signIn">Sign in</button></a>';
        }
        else{
            echo '<button id="account">My account</button>
        <div class="dropdown-content">
            <a href=""><img src="../../decoration-images/icons/upload.png">upload</a>
            <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a>
            <a href="likePage.php"><img src="../../decoration-images/icons/like.png">like</a>
            <a href="logOut.php"><img src="../../decoration-images/icons/logout.png">log out</a>
        </div>';
        }
        ?>
<!--        <button id="account">My account</button>-->
<!--        <div class="dropdown-content">-->
<!--            <a href="uploadedPage.html"><img src="../../decoration-images/icons/upload.png">upload</a>-->
<!--            <a href="myPhoto.html"><img src="../../decoration-images/icons/photo.png">my photos</a>-->
<!--            <a href="like.html"><img src="../../decoration-images/icons/like.png">like</a>-->
<!--            <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a>-->
<!--        </div>-->
    </div>
</header>

<?php
function getPopulars(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'WITH favors AS(
    SELECT count(*) AS num,ImageID FROM travelimagefavor GROUP BY ImageID)
    SELECT * FROM favors ORDER BY num DESC';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $number = 0;
    $arrays=[];
    while(($item = $statement->fetch()) && $number<7){
//        echo $item['ImageID'].' ';
        $arrays[$number]=$item['ImageID'];
        $number = $number+1;
//        return $item['CountryName'];
    }
    if($number<7) {
        $max=0;
        $sql = 'SELECT max(ImageID) as max FROM travelimage';
        $statement=$pdo->prepare($sql);
        $statement->execute();
        if($item=$statement->fetch()){
            $max = $item['max'];
//            echo $max;
        }
        while ($number < 7) {
            $rand = mt_rand(1,$max);
            if(in_array($rand,$arrays)){
                continue;
            }
            else {
                $arrays[$number] =$rand;
                $number = $number+1;
//                echo $rand.' ';
            }
        }
    }
    return $arrays;
}
//getPopulars();// 这个函数是OK的
$arrays = getPopulars();

function getImageFromID($ImageID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM travelimage WHERE ImageID=:imageID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':imageID',$ImageID);
    $statement->execute();
    if($item=$statement->fetch()){
//        echo $item['PATH'];
        return $item;
    }
    return null;
}
//getImageFromID(1); // 这个函数也没有问题
?>
<div id="headPhoto">
    <?php
    echo '<img src="../../travel-images/large/'.getImageFromID($arrays[0])['PATH'].'">';
    ?>
<!--    <img src="../../travel-images/medium/8711623884.jpg">-->
</div>

<!--    <div id="toTop"><img src="../../img1/toTop.jpg"></div>-->


<main id="hotExhibit">
    <div>
        <?php
        include_once('imageTools.php');
        $i = 0;
//        <a href="picture.php?title='.getImageFromID($arrays[$i+1])['Title'].'&username='.$_SESSION['username'].'&path=../../travel-images/medium/'.getImageFromID($arrays[$i+1])['PATH'].'&description='.getImageFromID($arrays[$i+1])['Description'].'&username='.$_SESSION['username'].'&country='.getCountry(getImageFromID($arrays[$i+1])).'&city='.getCity(getImageFromID($arrays[$i+1])).'&favor='.getFavor(getImageFromID($arrays[$i+1])['ImageID']).'"><img src="../../travel-images/square-medium/'.getImageFromID($arrays[$i+1])['PATH'].'"></a>

        while ($i<6) {
            echo '<ul class="hotPicture">
            <li>
                <a href="picture.php?ImageID='.getImageFromID($arrays[$i+1])['ImageID'].'"><img src="../../travel-images/square-medium/'.getImageFromID($arrays[$i+1])['PATH'].'"></a>
            </li>
            <li class="name">'.getImageFromID($arrays[$i+1])['Title'].'</li>
            <li class="explanation">'.getImageFromID($arrays[$i+1])['Description'].'</li>
            </ul>';
            $i++;
        }
        ?>
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <!--                class="cutPicture"-->-->
<!--                <a href="picture.php?"><img src="../../travel-images/square-medium/5855213165.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">beautiful</li>-->
<!--            <li class="explanation">填充背景颜色的时候中间不会有table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <a href="picture.html"><img src="../../travel-images/square-medium/5856616479.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">lovely</li>-->
<!--            <li class="explanation">table不设置padding，保证td和table之间不table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <a href="picture.html"><img src="../../travel-images/square-medium/5855191275.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">wonderful</li>-->
<!--            <li class="explanation">裁剪好方便排版的正方形图片。我们在table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div align="center">-->
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <a href="picture.html"><img src="../../travel-images/square-medium/5855209453.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">unforgettable</li>-->
<!--            <li class="explanation">示图片、图片标题、拍摄者、图片描述、table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <a href="picture.html"><img src="../../travel-images/square-medium/5855221959.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">excellent</li>-->
<!--            <li class="explanation">击注册后跳转到登录界面，用户需要再次登陆table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
<!--        <ul class="hotPicture">-->
<!--            <li>-->
<!--                <a href="picture.html"><img src="../../travel-images/square-medium/5855729828.jpg"></a>-->
<!--            </li>-->
<!--            <li class="name">sunny</li>-->
<!--            <li class="explanation">用户名、邮箱、密码进行注册，登陆密码不得table不设置padding，保证td和table之间不</li>-->
<!--        </ul>-->
    </div>
</main>

<footer class="homeFoot">
    <div class="personalInfo">
        <div>
            <span>微信：jj18956966621</span>
            <br>
            <br>
            <br>
            <span>住址：仙女们聚集地:)</span>
        </div>
        <div>
            <span>电话：18021006202</span>
            <br>
            <br>
            <br>
            <span>欢迎来找仙女们玩儿</span>
        </div>
        <div class="cartoon">
            <img src="../../decoration-images/img1/cartoon.jpg">
        </div>
    </div>
    <div class="weChat">
        <img src="../../decoration-images/img1/myWechat.jpg">
    </div>
    <p>This is the first web by Little JiangJiang. Wish you best!</p>

</footer>
<div id="toTop">
    <div><img src="../../decoration-images/img1/refresh.jpg" onclick="alert('refresh pictures')"></div>
    <a href="#header"><img src="../../decoration-images/img1/toTop.jpg"></a>
</div>
<!--    <script>-->
<!--        var sticky = document.querySelector('#toTop');-->
<!--        var origOffsetY = sticky.offsetTop;-->

<!--        function onScroll(e) {-->
<!--            window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :-->
<!--                sticky.classList.remove('fixed');-->
<!--        }-->

<!--        document.addEventListener('scroll', onScroll);-->
<!--    </script>-->
</body>
</html>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/foot.js"></script>
<script src="../js/home.js"></script>
