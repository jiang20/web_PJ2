// function changed() {
//     var mainHeight = document.body.clientHeight;
//     var windowHeight = document.documentElement.scrollHeight-165;
//     if (mainHeight > windowHeight){
//         $("#normalFoot").removeClass("footerNotFull");
//     }
//     else{
//         $("#normalFoot").addClass("footerNotFull");
//     }
// }

// document.body.clientHeight
// document.documentElement.scrollHeight


function changed() {
    var mainHeight = document.body.clientHeight;
    // var mainHeight = document.getElementsByName("main")[0].clientHeight;
    var windowHeight = document.documentElement.scrollHeight-100;
    // console.log(mainHeight);
    // console.log(windowHeight);
    if (mainHeight<windowHeight){
        $("#normalFoot").addClass("footerNotFull");
    }
    else{
        $("#normalFoot").removeClass("footerNotFull");
    }

}

$(function () {
    var mainHeight = document.body.clientHeight;
    // var mainHeight = document.getElementsByName("main")[0].clientHeight;
    var windowHeight = document.documentElement.scrollHeight-100;
    // console.log(mainHeight);
    // console.log(windowHeight);
    if (mainHeight<windowHeight){
        $("#normalFoot").addClass("footerNotFull");
    }
    else{
        $("#normalFoot").removeClass("footerNotFull");
    }
});