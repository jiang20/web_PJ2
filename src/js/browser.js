// window.onload = function () {
//     var url = "../../cities.json"; /*json文件url，本地的就写本地的位置，如果是服务器的就写服务器的路径*/
//     var request = new XMLHttpRequest();
//     request.open("get", url);/*设置请求方法与路径*/
//     request.send(null);/*不发送数据到服务器*/
//     request.onload = function () {/*XHR对象获取到返回信息后执行*/
//         if (request.status == 200) {/*返回状态为200，即为数据获取成功*/
//             var json = JSON.parse(request.responseText);
//             for(var i=0;i<json.length;i++){
//                 console.log(json[i].name);
//             }
//             console.log(json);
//         }
//     }
// }
// function city_change1(){
//     var data;
//     readTextFile("../../cities.json",function (text) {
//         data = text;
//     });
//     alert(data);
// }

// function readTextFile(file, callback) {
//     var rawFile = new XMLHttpRequest();
//     rawFile.overrideMimeType("application/json");
//     rawFile.open("GET", file, true);
//     rawFile.onreadystatechange = function () {
//         if (rawFile.readyState === 4 && rawFile.status == "200") {
//             callback(rawFile.responseText);
//         }
//     }
//     rawFile.send(null);
// }

var data =
    [{country:"Filter By Country",cities:["Filter-By-City"]},
        {country:"China",cities:["Shanghai","Kunming","Beijing","Yantai"]},
        {country:"Japan",cities:["Tokyo", "Osaka", "Kamakura"]},
        {country:"Italy",cities:["Roma","Milan","Venice","Florence"]},
        {country:"America",cities:["New York","San Francisco", "Washington"]}];


// country_select.onchange =
function city_change() {
    var country_select = document.getElementById("country_select");
    var country = country_select.value;
    // alert('you choose '+country);
    var cities;

    var city_select = document.getElementById("city_select");
    var city_nums = city_select.options.length;

    //删除之前的选择导致新增的选项
    if (city_nums > 0) {
        for (var i = 0; i < city_nums; i++) {
            city_select.options.remove(0);
        }
    }
    for (var k = 0; k < data.length; k++) {
        if (country === data[k].country) {
            cities = data[k].cities;
            break;
        }
    }
    for (var j = 0; j < cities.length; j++) {
        var option = document.createElement("option");
        option.value = cities[j];
        option.innerHTML = cities[j];
        city_select.appendChild(option);
    }
};


$(function () {
    var cut = document.getElementsByClassName("cut");
    var w = cut.clientWidth;
    var h = cut.clientHeight;
    var height = "height";
    var width = "width";
    // alert(w);
    // alert(h);
    if(w>h){
        // alert(1)
        $(".cut").removeAttr(width);
    }
    else{
        // alert(2)
        $(".cut").removeAttr(height);
    }
    var ims = document.getElementsByClassName("imageCut");
    for (var index = 0;index<ims.length;++index){
        var im = ims[index];
        // alert(im.src);
        var realWidth = im.clientWidth;
        var realHeight = im.clientHeight;
        // alert(realWidth);
        // alert(realHeight);
        if (realWidth !== realHeight) {
            // im.style.height = `${parseInt(getStyle(im, "width"))}px`;
            // im.css("height",${parseInt(getStyle(im, "width"))}px);
            // var h = "height";
            // im[h] = realWidth+"px";
            // im.clientHeight = realWidth;
            // im.css("height", realWidth);
            // im.css("width",realWidth);
            // im.style("height",realWidth);
        }
        // alert(im.clientHeight);
    }
});

function getStyle(parm1,parm2) {
    return parm1.currentStyle ? parm1.currentStyle[parm2] : getComputedStyle(parm1)[parm2];  //parm1,要改变的元素代替名;parm2,要改变的属性名
}
//     switch (country_select) {
//         case "China":{
//             var length1= data[0].length;
//             for(var j = 0; j < length1; j++){
//                 // addOption(data[0][i]);
//                 var opt1 = document.createElement("option");
//                 opt1.value = data[0][j];
//                 opt1.text = data[0][j];
//                 city_select.options.add(opt1);
//             }
//         }
//         break;
//         case "Japan":{
//             var length2 = data[1].length;
//             for(var k = 0; k < length2; k++){
//                 // addOption(data[1][i]);
//                 var opt2 = document.createElement("option");
//                 opt2.value = data[1][k];
//                 opt2.text = data[1][k];
//                 city_select.options.add(opt2);
//             }
//         }
//         break;
//         case "Italy":{
//             var length3 = data[2].length;
//             for(var m = 0; m < length3; m++){
//                 // addOption(data[2][i]);
//                 var opt3 = document.createElement("option");
//                 opt3.value = data[2][m];
//                 opt3.text = data[2][m];
//                 city_select.options.add(opt3);
//             }
//         }
//         break;
//         case "America":{
//             var length4 = data[3].length;
//             for(var n = 0; n < length4; n++){
//                 // addOption(data[3][i]);
//                 var opt4 = document.createElement("option");
//                 opt4.value = data[3][n];
//                 opt4.text = data[3][n];
//                 city_select.options.add(opt4);
//             }
//         }
//         break;
//     }
// }

// function addOption(val, txt) {
//     var opt = document.createAttribute("option");
//     opt.value = val;
//     opt.text = txt;
//     city_select.options.add(opt);
// }
