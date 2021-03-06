<!DOCTYPE html>
<html lang="en">
<?php
session_start();
echo $_SESSION['username'];// ok
include_once('../../configure/travel_info.php')
?>
<head>
    <meta charset="UTF-8">
    <title>TravelShare:BrowsePage</title>
    <link rel="stylesheet" type="text/css" href="../styles/top.css">
    <link rel="stylesheet" type="text/css" href="../styles/browser.css">
    <link rel="stylesheet" type="text/css" href="../styles/foot.css">
    <link rel="stylesheet" type="text/css" href="../styles/pagination.css">
    <!--    <script src="../js/browser.js"></script>-->
    <!--    <link href="../js/browser.js">-->
</head>
<body onresize="changed()">
<header id="header">
    <nav class="navigation">
        <ul>
            <li><img src="../../decoration-images/img1/cartoon.jpg"></li>
            <li><a href="homePage.php">Home</a></li>
            <li><a class="active" href="browsePage.php">Browse</a></li>
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
    <div id="leftBrowser">
        <table>
            <tr>
                <th>
                    Search By Title
                </th>
            </tr>
            <tr>
                <td>
                    <input type="text">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <th>
                    Hot Content
                </th>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Sea</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Animal</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Forest</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Food</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Entertainment</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">History</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>
                    Hot Cities
                </th>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">China</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Japan</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">Italy</td>
            </tr>
            <tr>
                <td onclick="alert('Filtering...')">America</td>
            </tr>
        </table>
    </div>
    <div id="filter">
        <table>
            <tr>
                <th>
                    Filter
                </th>
            </tr>
            <tr>
                <td>
                    <div class="filters">
                        <form>
                            <select>
                                <option value=""disabled selected hidden>Filter-By-Content</option>
                                <option value="aaa">Sea</option>
                                <option value="bbb">Animal</option>
                                <option value="ccc">Forest</option>
                                <option value="ccc">Food</option>
                                <option value="ccc">Entertainment</option>
                                <option value="ccc">History</option>
                            </select>
                            <select id="country_select" onchange="city_change()">
                                <option value="Filter By Country" selected>Filter By Country</option>
                                <option value="China">China</option>
                                <option value="Japan">Japan</option>
                                <option value="Italy">Italy</option>
                                <option value="America">America</option>
                            </select>
                            <select id="city_select">
                                <option value="Filter By City" selected>Filter By City</option>
                                <!--                                    <option value="aaa">hat</option>-->
                                <!--                                    <option value="bbb">coat</option>-->
                                <!--                                    <option value="ccc">jacket</option>-->
                            </select>
                        </form>
                    </div>
                    <button onclick="alert('Filtering...waiting for a moment')">Filter</button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="pictures">
                        <div>
                            <!--                                square/square-medium/222222.jpg-->
                            <a href="picture.html"><img src="../../travel-images/square-medium/222222.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/222223.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855174537.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855191275.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855209453.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855221959.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855729828.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855213165.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5856616479.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/6114859969.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5855752464.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5856654945.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5856658791.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5857298322.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/5857398054.jpg"></a>
                            <a href="picture.html"><img src="../../travel-images/square-medium/6114850721.jpg"></a>
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/normal/medium/9493997865.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/normal/medium/6596046267.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855174537.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855191275.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855209453.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855221959.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855729828.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855213165.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5856616479.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/6114859969.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5855752464.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5856654945.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5856658791.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5857298322.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/5857398054.jpg"></a></div>-->
                            <!--                                <div class="imageCut"><a href="picture.html"><img src="../../img/square/square-medium/6114850721.jpg"></a></div>-->
                        </div>
                        <div class="pagination">
                            <ul>
                                <li><a href="../../index.html">«</a></li>
                                <li><a class="active" href="browsePage.html">首</a></li>
                                <li><a href="browsePage.html">2</a></li>
                                <li><a href="browsePage.html">3</a></li>
                                <li><a href="browsePage.html">4</a></li>
                                <li><a href="browsePage.html">5</a></li>
                                <li><a href="browsePage.html">6</a></li>
                                <li><a href="browsePage.html">尾</a></li>
                                <li><a href="browsePage.html">»</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
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
<script src="../js/browser.js"></script>
