// let images = document.getElementsByTagName("img");
// let p;
// for (let i = 4; i < images.length; i++) {
//     images[i].onclick = function () {
//         p = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>TravelShare:PicturePage</title> <link rel="stylesheet" type="text/css" href="../styles/top.css"> <link rel="stylesheet" type="text/css" href="../styles/picture.css"> <link rel="stylesheet" type="text/css" href="../styles/foot.css"> </head> <body onresize="changed()"> <header id="header"> <nav class="navigation"> <ul> <li><img src="../../decoration-images/img1/cartoon.jpg"></li> <li><a href="">Home</a></li> <li><a href="">Browse</a></li> <li><a href="">Search</a></li> </ul> </nav> <div class="dropdown"> <button id="account">My account</button> <div class="dropdown-content"> <a href=""><img src="../../decoration-images/icons/upload.png">upload</a> <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a> <a href=""><img src="../../decoration-images/icons/like.png">like</a> <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a> </div> </div> </header> <main> <table id="specificPicture"> <tr> <td class="tableTitle">Details</td> </tr> <tr> <td> <div class="detailsTitle"> <div class="pictureTitle">碧海苍岭</div> <div class="pictureOwner">by Jiangjiang</div> </div> <div class="primary"> <div class="picture"> <img src="../../travel-images/medium/9493997865.jpg"> </div> <div class="details"> <table> <tr> <td class="tableTitle">Like Number</td> </tr> <tr> <td class="likes">99</td> </tr> </table> <table> <tr> <td class="tableTitle">Image Details</td> </tr> <tr> <td>Content: Scenery</td> </tr> <tr> <td>Country: China</td> </tr> <tr> <td>City: Shanghai</td> </tr> </table> <button type="button" onclick="alert("小可爱，图片已收藏啦:)～")">:) 收藏</button> </div> </div> <p class="introduction">关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 aler即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方 </p> </td> </tr> </table> </main> <footer id="normalFoot" class="footerNotFull"> <p>This is the first web by Little JiangJiang. Wish you best!</p> </footer> </body> </html> <script src="../js/jquery-3.3.1.js"></script> <script src="../js/jquery-3.3.1.min.js"></script> <script src="../js/foot.js"></script>';
//         w=window.open('about:blank');
//         w.document.write(p);
//         w.document.close();
//         w.open();
//     }
// }
let images = document.getElementsByTagName("img");
let p;
// for (let i = 4; i < images.length; i++) {
//     images[i].onclick = "return change();";
    // function () {
    //     // p = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>TravelShare:PicturePage</title> <link rel="stylesheet" type="text/css" href="../styles/top.css"> <link rel="stylesheet" type="text/css" href="../styles/picture.css"> <link rel="stylesheet" type="text/css" href="../styles/foot.css"> </head> <body onresize="changed()"> <header id="header"> <nav class="navigation"> <ul> <li><img src="../../decoration-images/img1/cartoon.jpg"></li> <li><a href="">Home</a></li> <li><a href="">Browse</a></li> <li><a href="">Search</a></li> </ul> </nav> <div class="dropdown"> <button id="account">My account</button> <div class="dropdown-content"> <a href=""><img src="../../decoration-images/icons/upload.png">upload</a> <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a> <a href=""><img src="../../decoration-images/icons/like.png">like</a> <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a> </div> </div> </header> <main> <table id="specificPicture"> <tr> <td class="tableTitle">Details</td> </tr> <tr> <td> <div class="detailsTitle"> <div class="pictureTitle">碧海苍岭</div> <div class="pictureOwner">by Jiangjiang</div> </div> <div class="primary"> <div class="picture"> <img src="../../travel-images/medium/9493997865.jpg"> </div> <div class="details"> <table> <tr> <td class="tableTitle">Like Number</td> </tr> <tr> <td class="likes">99</td> </tr> </table> <table> <tr> <td class="tableTitle">Image Details</td> </tr> <tr> <td>Content: Scenery</td> </tr> <tr> <td>Country: China</td> </tr> <tr> <td>City: Shanghai</td> </tr> </table> <button type="button" onclick="alert("小可爱，图片已收藏啦:)～")">:) 收藏</button> </div> </div> <p class="introduction">关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 aler即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方 </p> </td> </tr> </table> </main> <footer id="normalFoot" class="footerNotFull"> <p>This is the first web by Little JiangJiang. Wish you best!</p> </footer> </body> </html> <script src="../js/jquery-3.3.1.js"><\/script> <script src="../js/jquery-3.3.1.min.js"><\/script> <script src="../js/foot.js"><\/script>';
    //     // w=window.open('picture.html');
    //     window.location.href = 'picture.html';
    //     let photoDiv = w.document.getElementsByClassName('picture')[0];
    //     photoDiv.removeChild();
    //     let newPhoto = document.createElement('img');
    //     newPhoto.src = '../../decoration-images/icons/upload.png';
    //     photoDiv.appendChild(newPhoto);
    //     // photo.removeAttribute('src');
    //     // photo.setAttribute('src','../../decoration-images/icons/upload.png');
    //     // w.document.write(p);
    //     // w.document.close();
    //     w.open();
    //     // alert(w.document.username);
    //     // alert('here'+photoDiv.value);
    // }
// }
function change() {
    // p = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>TravelShare:PicturePage</title> <link rel="stylesheet" type="text/css" href="../styles/top.css"> <link rel="stylesheet" type="text/css" href="../styles/picture.css"> <link rel="stylesheet" type="text/css" href="../styles/foot.css"> </head> <body onresize="changed()"> <header id="header"> <nav class="navigation"> <ul> <li><img src="../../decoration-images/img1/cartoon.jpg"></li> <li><a href="">Home</a></li> <li><a href="">Browse</a></li> <li><a href="">Search</a></li> </ul> </nav> <div class="dropdown"> <button id="account">My account</button> <div class="dropdown-content"> <a href=""><img src="../../decoration-images/icons/upload.png">upload</a> <a href=""><img src="../../decoration-images/icons/photo.png">my photos</a> <a href=""><img src="../../decoration-images/icons/like.png">like</a> <a href="../../index.html"><img src="../../decoration-images/icons/sign.png">sign in</a> </div> </div> </header> <main> <table id="specificPicture"> <tr> <td class="tableTitle">Details</td> </tr> <tr> <td> <div class="detailsTitle"> <div class="pictureTitle">碧海苍岭</div> <div class="pictureOwner">by Jiangjiang</div> </div> <div class="primary"> <div class="picture"> <img src="../../travel-images/medium/9493997865.jpg"> </div> <div class="details"> <table> <tr> <td class="tableTitle">Like Number</td> </tr> <tr> <td class="likes">99</td> </tr> </table> <table> <tr> <td class="tableTitle">Image Details</td> </tr> <tr> <td>Content: Scenery</td> </tr> <tr> <td>Country: China</td> </tr> <tr> <td>City: Shanghai</td> </tr> </table> <button type="button" onclick="alert("小可爱，图片已收藏啦:)～")">:) 收藏</button> </div> </div> <p class="introduction">关于左边栏的内容，需求文档和网⻚截图出现了冲突。这里我们修改为 热⻔国家快速浏览 、 热⻔城市快速浏览 、热⻔内容快速浏览 三个条目，即增加一个热⻔内容快速浏览的板块。点击 热⻔国家快速浏览 、 热⻔城市快速浏览 、 热⻔内容快速浏览 这三个 title下的条目只需要 aler即可!!!(工作失误) 但是你写了也没关系，反正PJ 2也是要写的itle筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方使用⻚码进行多个搜索结果⻚的跳转......筛选部分:用户可以通过单选选项选择使用标题筛选或者描述筛选，并可以在输入框中输入搜索文 字之后点击下方按钮进行搜索(alert)。默认通过标题筛选。 搜索结果:展示满足搜索条件的图片信息 图片信息包括图片、图片标题、图片描述。 每一项结果的左边是缩略图，右边是标题和描述，标题与描述有区分。 描述需要有多行，如果超出描述框以省略号显示。 下方 </p> </td> </tr> </table> </main> <footer id="normalFoot" class="footerNotFull"> <p>This is the first web by Little JiangJiang. Wish you best!</p> </footer> </body> </html> <script src="../js/jquery-3.3.1.js"><\/script> <script src="../js/jquery-3.3.1.min.js"><\/script> <script src="../js/foot.js"><\/script>';
    // w=window.open('picture.html');
    window.location.href = 'myPhoto.html';
    return false;
    // let photoDiv = w.document.getElementsByClassName('picture')[0];
    // photoDiv.removeChild();
    // let newPhoto = document.createElement('img');
    // newPhoto.src = '../../decoration-images/icons/upload.png';
    // photoDiv.appendChild(newPhoto);
    // photo.removeAttribute('src');
    // photo.setAttribute('src','../../decoration-images/icons/upload.png');
    // w.document.write(p);
    // w.document.close();
    // w.open();
    // alert(w.document.username);
    // alert('here'+photoDiv.value);
}