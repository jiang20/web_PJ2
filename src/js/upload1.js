// $(".uploadButton").click(function(){
//     $("#upload").click();
// });
// $(".uploadButton").click(function(){
//     var file = this.files[0] ? this.files[0] : null; //不晓得这里换成$(this)为什么不行
//     if(null == file){
//         return false;
//     }
//     var file_reader = new FileReader();
//     file_reader.onload = (function(){
//         var image_url = this.result;        // 这是图片的路径
//         $("#js-portrait").attr('src', image_url);
//     });
//     file_reader.readAsDataURL(file);
// });


// // function move 开始
// var move = {
//     imgSrc:[], //图片路径
//     imgFile:[],//文件流
//     imgName:[], //图片名字
//     //选择图片
//     // 函数闭包，让外部引入调用
//     imgUpload :function(obj){
//         var oInput = '#' + obj.inputId;
//         var imgBox = '#' + obj.imgBox;
//         var btn = '#' + obj.buttonId;
//         $(oInput).on("change", ()=> {
//             var fileImg = $(oInput)[0];
//             var fileList = fileImg.files;
//             for(var i = 0; i < fileList.length; i++) {
//                 var imgSrcI = this.getObjectURL(fileList[i]);
//                 this.imgName.push(fileList[i].name);
//                 this.imgSrc.push(imgSrcI);
//                 this.imgFile.push(fileList[i]);
//             }
//             this.addNewContent(obj.imgBox);
//
//             // console.log(obj);
//
//         })//change
//         $(btn).on('click',()=> {
//             if(!this.limitNum(obj.num)){
//                 alert("图片数量最多"+obj.num+"个");
//                 return false;
//             }
//             else if(this.imgFile.length==0){
//                 alert('请选择图片！');
//             }
//             else if(this.imgFile.length>0&&this.limitNum(obj.num)){
//                 //用formDate对象上传
//                 alert('图片上传中请稍后');
//                 var fd = new FormData($('.upBox')[0]);
//                 for(var i=0;i<this.imgFile.length;i++){
//                     fd.append(obj.data+"[]",this.imgFile[i]);
//                 }
//                 // console.log(fd); //FormData 对象
//                 move.submitPicture(obj,obj.upUrl, fd);
//             }
//
//         });//click
//     },//return
//     //图片展示
//     addNewContent:function (obj) {
//         // console.log(obj);
//         console.log(this.imgSrc.length);
//         $('#'+obj).html("");
//         for(var a = 0; a < this.imgSrc.length; a++) {
//             var oldBox = $('#'+obj).html();
//             $('#'+obj).html(oldBox + '<div class="imgContainer"><img title=' + this.imgName[a] + ' alt=' + this.imgName[a] + ' src=' + this.imgSrc[a] + ' οnclick="imgDisplay(this)"><p οnclick="removeImg(this,' + a + ')" class="imgDelete">删除</p></div>');
//         }
//         alert('您有'+this.imgSrc.length+'张图片预先加载完毕');
//     },
//     //删除
//     removeImg:function(obj,index){
//         // console.log(move.imgSrc)
//         // console.log(obj);//obj为p标签
//         // 删除原来数组中的，并且返回被删除的项目
//         move.imgSrc.splice(index,1);
//         move.imgFile.splice(index,1);
//         move.imgName.splice(index,1);
//         var boxId = $(obj).parent('.imgContainer').parent().attr("id");
//         move.addNewContent(boxId);
//     },
//     //限制图片个数
//     limitNum:function (num){
//         if(!num){
//             return true;
//         }else if(this.imgFile.length>num){
//             return false;
//         }else{
//             return true;
//         }
//     },
//
//     //上传(将文件流数组传到后台)
//     // submitPicture :function(obj,url,data){
//     //     //    for (var p of data) {
//     //     //   	console.log(p);
//     //     //   	// p就是文件流
//     //     // }
//     //     console.log($('#'+obj.imgBox))
//     //     if(url&&data){
//     //         $.ajax({
//     //             type: "post",
//     //             url: url,
//     //             async: true,
//     //             data: data,
//     //             processData: false,
//     //             contentType: false,
//     //             success: (dat)=> {
//     //                 // alert(dat.msg);
//     //                 alert('你成功上传了'+this.imgFile.length+'张图片');
//     //                 // console.log(this);
//     //                 this.imgSrc=[]; //图片路径
//     //                 this.imgFile=[];//文件流
//     //                 this.imgName=[];
//     //                 // 移除当前的图片
//     //                 $('#'+obj.imgBox).find('.imgContainer').remove();
//     //                 $('.goon').html('继续上传');
//     //                 // console.log(dat.msg);
//     //             },
//     //             error:function(dat){
//     //                 alert('图片上传失败!');
//     //                 console.log(dat);
//     //             }
//     //         });
//     //     }else{
//     //         alert('请打开控制台查看传递参数！');
//     //     }
//     // },
//     //图片预览路径
//     getObjectURL:function (file) {
//         var url = null;
//         if(window.createObjectURL != undefined) { // basic
//             url = window.createObjectURL(file);
//         } else if(window.URL != undefined) { // mozilla(firefox)
//             url = window.URL.createObjectURL(file);
//         } else if(window.webkitURL != undefined) { // webkit or chrome
//             url = window.webkitURL.createObjectURL(file);
//         }
//         return url;
//     }
// }




//add-user-headImg 是 input ,使用change监听
$("#file1").on("change",function(){

    //检测用户的浏览器是否支持FileReader
    if(typeof FileReader==='undefined'){
        alert("您的浏览器暂不支持上传图片");
    }
    //获取文件
    var file = this.files[0];
    //判断文件格式
    if(file.type != 'image/png' && file.type != 'image/jpeg' && file.type != 'image/gif'){
        layer.msg("头像格式不正确",{time:3000,offset:"250px",shift:6,area:["150px","30px"]});
        return false;
    }
    // alert('geshi')
    //判断头像大小,不超过1.5M
    if(file.size > (1024 * 1024 * 1.5)){
        layer.msg("头像图片不能超过1.5M",{time:3000,offset:"300px",shift:6,area:["150px","30px"]});
        return false;
    }
    //读取图片并读取图片宽高，以等比例显示
    var reader = new FileReader();
    reader.readAsDataURL(file);
    //读取完成，构造Image对象，获取 Image对象,获取宽高
    //onload是在上面的读取完毕后触发的
    // alert('读取wanbi');
    reader.onload = function(){
        //获取读取的结果，也就是URL
        var imgURL = this.result;
        //构造Image对象，其实也就是<img />标签，只不过没有属性，可以赋予属性
        var image = new Image();
        //赋予它src就是给它图片了。
        image.src = imgURL;
        //这里设置你在预览区的图片，显示，因为上面的Image对象我们只用来获取宽高，不用它创建img
        //所以需要你自己准备
        $(".uploadedPicture").attr("src",imgURL);
        image.onload = function(){
            //获取Image对象的宽高
            var fileWidth = this.width;
            var fileHeight = this.height;
            //上传文件的宽高之比
            var ratio =  fileWidth / fileHeight;
            //调整图片比例,固定宽为 155
            var ImgHeight = 155 / ratio;
            //如果高超出比例,就按最大比例，145是我定的最大高
            if(ImgHeight > 145){
                ImgHeight = 145;
            }
            //调整高，这里一定要加 !important，否则下次你设置的时候，css不会改变。
            $(".uploadedPicture").css({height:ImgHeight+"px !important"});
        };
    };
});

