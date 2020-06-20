<!DOCTYPE html>
<html lang="en">
<?php
session_start();
echo $_SESSION['username'];
?>
<head>
    <meta charset="UTF-8">
    <title>TravelShare:LikePage</title>
    <link rel="stylesheet" type="text/css" href="../styles/top.css">
    <link rel="stylesheet" type="text/css" href="../styles/likePhoto.css">
    <link rel="stylesheet" type="text/css" href="../styles/pagination.css">
    <link rel="stylesheet" type="text/css" href="../styles/foot.css">
</head>
<body onresize="changed()">
<?php
require_once("../../configure/travel_info.php");
function getAllLikes(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM traveluser where Username =:user";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user',$_SESSION['username']);
    $statement->execute();
    $userID = ($statement->fetch())['UID'];
//    echo $userID;
    $sql = "SELECT * FROM travelimage where UID =:userId";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userId',$userID);
    $statement->execute();
//    while ($item = $statement->fetch()) {
//        echo $item['Title'];//ok
//    }
    return [$userID,$statement];
}
include_once ('imageTools.php');
//function getCountry($result){
//    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = 'SELECT * FROM geocountries where ISO =:countryiso';
//    $statement = $pdo->prepare($sql);
//    $statement->bindValue(':countryiso',$result['CountryCodeISO']);
//    $statement->execute();
//    if($item = $statement->fetch()){
////        echo $item['CountryName'];
//        return $item['CountryName'];
//    }
//    return null;
//}
//function getCity($result){
//    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = 'SELECT * FROM geocities where GeoNameID =:cityNode';
//    $statement = $pdo->prepare($sql);
//    $statement->bindValue(':cityNode',$result['CityCode']);
//    $statement->execute();
//    if($item = $statement->fetch()){
////        echo $item['AsciiName'];
//        return $item['AsciiName'];
//    }
//    return null;
//}
//function getFavor($imageId){
//    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = 'SELECT count(*) as number FROM travelimagefavor where ImageID =:imageID';
//    $statement = $pdo->prepare($sql);
//    $statement->bindValue(':imageID',$imageId);
//    $statement->execute();
//    if($item = $statement->fetch()){
////        echo $item['number'];
//        return $item['number'];
//    }
//    return null;
//}
function getCount($results){
    $number = 0;
    while ($item = $results->fetch()){
        $number = $number+1;
        echo $number;
    }
    return $number;
}
//getAllLikes();
?>
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
            <a href="myPhoto.php"><img src="../../decoration-images/icons/photo.png">my photos</a>
            <a href="like.html" class="active"><img src="../../decoration-images/icons/like.png">like</a>
            <a href="logOut.php"><img src="../../decoration-images/icons/logout.png">log out</a>
        </div>
    </div>
</header>

<main>
    <table class="likePhoto">
        <tr>
            <td class="tableTitle">My Favorites</td>
        </tr>
<!--        <a href="picture.php?title='.$result['Title'].'&owner='.$_SESSION['username'].'&path=../../travel-images/medium/'.$result['PATH'].'&description='.$result['Description'].'&country='.getCountry($result).'&city='.getCity($result).'&favors='.getFavor($result['ImageID']).'"><img src="../../travel-images/medium/'.$result['PATH'].'"></a>-->
        <?php
        $userID = getAllLikes()[0];
        $results = getAllLikes()[1];
        $amount = 0;
        while ($result = $results->fetch()){
//            echo $result['CountryCodeISO'];
            $amount = $amount+1;
            echo '<tr><td>
                    <a href="picture.php?ImageID='.$result['ImageID'].'" onclick="transmitData()" ><img src="../../travel-images/medium/'.$result['PATH'].'"></a>
                    <table>
                        <tr>
                            <td class="photoTitle">'.$result['Title'].'</td>
                        </tr>
                        <tr>
                            <td class="introduction">'.$result['Description'].'</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="deleteButton" onclick="alert(\'delete\')">Delete</button>
                            </td>
                        </tr>
                    </table>
                </td></tr>';
//            echo '<img src="../../travel-images/medium/'.$result['PATH'].'">';
        }
//        $amount = getCount($results);
        $amountEachPage = 1;
        $pageNum = ($amount%$amountEachPage == 0)?$amount/$amountEachPage:$amount/$amountEachPage+1;
        ?>
    </table>
    <div class="pagination">
        <ul>
            <li><a href="../../index.html">«</a></li>
            <li><a class="active" href="../../index.html">1</a></li>
            <?php
            $pageNow = 0;
//            echo $amount;
            while ($pageNow<$pageNum-1){
                echo '<li><a href="../../index.html">' . ($pageNow + 2) . '</a></li>';
                $pageNow=$pageNow+1;
            }
            ?>
<!--            <li><a href="../../index.html">2</a></li>-->
<!--            <li><a href="../../index.html">3</a></li>-->
<!--            <li><a href="../../index.html">4</a></li>-->
<!--            <li><a href="../../index.html">5</a></li>-->
<!--            <li><a href="../../index.html">6</a></li>-->
<!--            <li><a href="../../index.html">尾</a></li>-->
            <li><a href="../../index.html">»</a></li>
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
<script src="../js/like.js"></script>
<!--<script src="../js/picture.js"></script>-->
<script>
    function transmitData() {
        let ImageID = '<?php $result['ImageID'] ?>'
        $.ajax(
            {
                url:'../pages/picture.php?ImageID='+ImageID,
            }
        )
    }
</script>
<!--<script>-->
<!--    let images = document.getElementsByTagName("img");-->
<!--    let p;-->
<!--    for (let i = 4; i < images.length; i++) {-->
<!--        images[i].onclick = "return change();";-->
<!--        // function () {-->
<!--        //     // p = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>TravelShare:PicturePage</title> <link rel="stylesheet" type="text/css" href="../styles/top.css"> <link rel="stylesheet" type="text/css" href="../styles/picture.css"> <link rel="stylesheet" type="text/css" href="../styles/foot.css"> </head> <body onresize="changed()"> <header id="header"> <nav class="navigation"> <ul> <li><img src="../../decoration-images/img1/cartoon.jpg"></li> <li><a href="">Home</a></li> <li><a href="">Browse</a></li> <li><a href="">Search</a></li> </ul> </nav> <div class="dropdown"> <button id="account">My account</button> <div class="dropdown-content"> <a href=""><img src="../../decoration-images/icons/upload.png">upload</a> <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a> <a href=""><img src="../../decoration-images/icons/like.png">like</a> <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a> </div> </div> </header> <main> <table id="specificPicture"> <tr> <td class="tableTitle">Details</td> </tr> <tr> <td> <div class="detailsTitle"> <div class="pictureTitle">碧海苍岭</div> <div class="pictureOwner">by Jiangjiang</div> </div> <div class="primary"> <div class="picture"> <img src="../../travel-images/medium/9493997865.jpg"> </div> <div class="details"> <table> <tr> <td class="tableTitle">Like Number</td> </tr> <tr> <td class="likes">99</td> </tr> </table> <table> <tr> <td class="tableTitle">Image Details</td> </tr> <tr> <td>Content: Scenery</td> </tr> <tr> <td>Country: China</td> </tr> <tr> <td>City: Shanghai</td> </tr> </table> <button type="button" onclick="alert("小可爱，图片已收藏啦:)～")">:) 收藏</button> </div> </div> <p class="introduction">关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 aler即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方 </p> </td> </tr> </table> </main> <footer id="normalFoot" class="footerNotFull"> <p>This is the first web by Little JiangJiang. Wish you best!</p> </footer> </body> </html> <script src="../js/jquery-3.3.1.js"><\/script> <script src="../js/jquery-3.3.1.min.js"><\/script> <script src="../js/foot.js"><\/script>';-->
<!--        //     // w=window.open('picture.html');-->
<!--        //     window.location.href = 'picture.html';-->
<!--        //     let photoDiv = w.document.getElementsByClassName('picture')[0];-->
<!--        //     photoDiv.removeChild();-->
<!--        //     let newPhoto = document.createElement('img');-->
<!--        //     newPhoto.src = '../../decoration-images/icons/upload.png';-->
<!--        //     photoDiv.appendChild(newPhoto);-->
<!--        //     // photo.removeAttribute('src');-->
<!--        //     // photo.setAttribute('src','../../decoration-images/icons/upload.png');-->
<!--        //     // w.document.write(p);-->
<!--        //     // w.document.close();-->
<!--        //     w.open();-->
<!--        //     // alert(w.document.username);-->
<!--        //     // alert('here'+photoDiv.value);-->
<!--        // }-->
<!--    }-->
<!--    function change() {-->
<!--        // p = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>TravelShare:PicturePage</title> <link rel="stylesheet" type="text/css" href="../styles/top.css"> <link rel="stylesheet" type="text/css" href="../styles/picture.css"> <link rel="stylesheet" type="text/css" href="../styles/foot.css"> </head> <body onresize="changed()"> <header id="header"> <nav class="navigation"> <ul> <li><img src="../../decoration-images/img1/cartoon.jpg"></li> <li><a href="">Home</a></li> <li><a href="">Browse</a></li> <li><a href="">Search</a></li> </ul> </nav> <div class="dropdown"> <button id="account">My account</button> <div class="dropdown-content"> <a href=""><img src="../../decoration-images/icons/upload.png">upload</a> <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a> <a href=""><img src="../../decoration-images/icons/like.png">like</a> <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a> </div> </div> </header> <main> <table id="specificPicture"> <tr> <td class="tableTitle">Details</td> </tr> <tr> <td> <div class="detailsTitle"> <div class="pictureTitle">碧海苍岭</div> <div class="pictureOwner">by Jiangjiang</div> </div> <div class="primary"> <div class="picture"> <img src="../../travel-images/medium/9493997865.jpg"> </div> <div class="details"> <table> <tr> <td class="tableTitle">Like Number</td> </tr> <tr> <td class="likes">99</td> </tr> </table> <table> <tr> <td class="tableTitle">Image Details</td> </tr> <tr> <td>Content: Scenery</td> </tr> <tr> <td>Country: China</td> </tr> <tr> <td>City: Shanghai</td> </tr> </table> <button type="button" onclick="alert("小可爱，图片已收藏啦:)～")">:) 收藏</button> </div> </div> <p class="introduction">关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 aler即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方 </p> </td> </tr> </table> </main> <footer id="normalFoot" class="footerNotFull"> <p>This is the first web by Little JiangJiang. Wish you best!</p> </footer> </body> </html> <script src="../js/jquery-3.3.1.js"><\/script> <script src="../js/jquery-3.3.1.min.js"><\/script> <script src="../js/foot.js"><\/script>';-->
<!--        // w=window.open('picture.html');-->
<!--        window.location.href = 'picture.html';-->
<!--        let photoDiv = w.document.getElementsByClassName('picture')[0];-->
<!--        photoDiv.removeChild();-->
<!--        let newPhoto = document.createElement('img');-->
<!--        newPhoto.src = '../../decoration-images/icons/upload.png';-->
<!--        photoDiv.appendChild(newPhoto);-->
<!--        // photo.removeAttribute('src');-->
<!--        // photo.setAttribute('src','../../decoration-images/icons/upload.png');-->
<!--        // w.document.write(p);-->
<!--        // w.document.close();-->
<!--        w.open();-->
<!--        // alert(w.document.username);-->
<!--        // alert('here'+photoDiv.value);-->
<!--    }-->
<!--</script>-->
