<!DOCTYPE html>
<html lang="en">
<?php
session_start();
echo $_SESSION['username'];
require_once("../../configure/travel_info.php");
?>
<head>
    <meta charset="UTF-8">
    <title>TravelShare:PicturePage</title>
    <link rel="stylesheet" type="text/css" href="../styles/top.css">
    <link rel="stylesheet" type="text/css" href="../styles/picture.css">
    <link rel="stylesheet" type="text/css" href="../styles/foot.css">
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
            <a href="myPhoto.php"><img src="../../decoration-images/icons/photo.png">my photos</a>
            <a href="likePage.php"><img src="../../decoration-images/icons/like.png">like</a>
            <a href="logOut.php"><img src="../../decoration-images/icons/logout.png">log out</a>
        </div>
    </div>
</header>
<main>
    <table id="specificPicture">
        <tr>
            <td class="tableTitle">Details</td>
        </tr>
        <tr>
            <td>
                <div class="detailsTitle">
                    <div class="pictureTitle">碧海苍岭奇怪</div>
                    <div class="pictureOwner">by Jiangjiang</div>
                </div>
                <div class="primary">
                    <div class="picture">
                        <img src="../../travel-images/medium/9493997865.jpg">
                    </div>
                    <div class="details">
                        <table>
                            <tr>
                                <td class="tableTitle">Like Number</td>
                            </tr>
                            <tr>
                                <td class="likes">99</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="tableTitle">Image Details</td>
                            </tr>
                            <tr>
                                <td>Content: Scenery</td>
                            </tr>
                            <tr>
                                <td>Country: China</td>
                            </tr>
                            <tr>
                                <td>City: Shanghai</td>
                            </tr>
                        </table>
                        <button type="button" onclick="solveCollect()">:) 收藏</button>
                    </div>
                </div>
                <p class="introduction">
                    关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔
                    城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。
                    点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 alert
                    即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle
                    筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方
                </p>
            </td>
        </tr>
    </table>
</main>
<footer id="normalFoot" class="footerNotFull">
    <p>This is the first web by Little JiangJiang. Wish you best!</p>
</footer>
</body>
</html>
<?php
function getImageFromID($ImageID)
{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM travelimage where ImageID =:imageID";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':imageID', $ImageID);
    $statement->execute();
    if($item=$statement->fetch()){
        return $item;
    }
    return null;
}
function getCountry($result){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM geocountries where ISO =:countryiso';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':countryiso',$result['CountryCodeISO']);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['CountryName'];
        return $item['CountryName'];
    }
    return null;
}
function getCity($result){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM geocities where GeoNameID =:cityNode';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':cityNode',$result['CityCode']);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['AsciiName'];
        return $item['AsciiName'];
    }
    return null;
}
function getFavor($imageID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT count(*) as number FROM travelimagefavor where ImageID =:imageID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':imageID',$imageID);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['number'];
    }
    return null;
}
function getNameFromUID($userID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT *  FROM traveluser where UID =:userID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userID',$userID);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['UserName'];
    }
    return null;
}

function getUIDFromNAME($username){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT *  FROM traveluser where UserName =:username';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':username',$username);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['UID'];
    }
    return null;
}

function collectPicture($UID,$ImageID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM travelimagefavor WHERE UID=:userID AND ImageID=:imageID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userID',$UID);
    $statement->bindValue(':imageID',$ImageID);
    $statement->execute();
    if($statement->fetch()){
        return;
    }
    $sql = 'INSERT INTO travelimagefavor(UID,ImageID) VALUES(:userID,:imageID)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userID',$UID);
    $statement->bindValue(':imageID',$ImageID);
    $statement->execute();
}

$imageId = $_GET['ImageID'];
//$imageId = 2;
$item = getImageFromID($imageId);
$title = $item['Title'];
$description = $item['Description'];
$username = getNameFromUID($item['UID']);
$favors = getFavor($imageId);
$country = getCountry($item);
$city = getCity($item);
$path = $item['PATH'];
//echo $imageId;

?>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/foot.js"></script>
<script>
    let url = window.location.search;
    url = url.substr(1);
    // alert(url);
    let arr = url.split('=');
    // alert(arr[1]);

    // pictureName
    let intro = document.getElementsByClassName("pictureTitle")[0];
    let text = "<?php echo $title?>";
    // alert(text);
    let newTitle = document.createElement('div');
    newTitle.setAttribute('class','pictureTitle');
    let textNode = document.createTextNode(text);
    newTitle.appendChild(textNode);
    intro.parentNode.appendChild(newTitle);
    intro.parentNode.removeChild(intro);

    //username
    // decodeURIComponent(arr[1].split('=')[1])
    let owner = document.getElementsByClassName("pictureOwner")[0];
    text = '<?php echo "by ".$username ?>';
    let newOwner = document.createElement('div');
    newOwner.setAttribute('class','pictureOwner');
    textNode = document.createTextNode(text);
    newOwner.appendChild(textNode);
    owner.parentNode.appendChild(newOwner);
    owner.parentNode.removeChild(owner);

    //path
    let path = document.getElementsByClassName('picture')[0].children[0];
    // path.src = decodeURIComponent(arr[2].split('=')[1]);
    path.src = '<?php echo "../../travel-images/medium/".$path?>';

    //description
    let description = document.getElementsByClassName('introduction')[0];
    text = "<?php echo $description?>";
    let newIntro = document.createElement('p');
    newIntro.setAttribute('class','introduction');
    textNode = document.createTextNode(text);
    newIntro.appendChild(textNode);
    description.parentNode.appendChild(newIntro);
    description.parentNode.removeChild(description);

    //country
    let country = document.getElementsByClassName('tableTitle')[2].parentElement.nextElementSibling.nextElementSibling.children[0];
    text = '<?php echo 'country: '.$country?>';
    let newCountry = document.createElement('td');
    textNode = document.createTextNode(text);
    newCountry.appendChild(textNode);
    country.parentNode.appendChild(newCountry);
    country.parentNode.removeChild(country);

    //city
    let city = document.getElementsByClassName('tableTitle')[2].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.children[0];
    text = '<?php echo 'City: '.$city?>';
    let newCity = document.createElement('td');
    textNode = document.createTextNode(text);
    newCity.appendChild(textNode);
    city.parentNode.appendChild(newCity);
    city.parentNode.removeChild(city);

    //number of likes
    let favor = document.getElementsByClassName('tableTitle')[1].parentElement.nextElementSibling.children[0];
    text = '<?php echo $favors?>';
    let newFavor = document.createElement('td');
    newFavor.setAttribute('class','likes');
    textNode = document.createTextNode(text);
    newFavor.appendChild(textNode);
    favor.parentNode.appendChild(newFavor);
    favor.parentNode.removeChild(favor);

</script>
<script>
    function solveCollect() {
        <?php
            collectPicture(getUIDFromNAME($_SESSION['username']),$imageId);
        ?>
        alert('小可爱，图片已收藏啦:)～');
    }
</script>