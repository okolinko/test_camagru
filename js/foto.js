var $ = function(id)
{
    return (document.getElementById(id));
}

window.onload = function(){
    var canvas = $('canvas');
    var video = $('video');
    var button = $('button');
    var button1 = $('button1');
    var button2 = $('button2');
    var button3 = $( 'button3');
    var button4 = $( 'button4');
    var button5 = $( 'button5');
    var button6 = $( 'button6');
    var button7 = $( 'button7');
    var button8 = $('button8');
    var allow = $('allow');
    var frame1 = $('frame');
    var frame2 = $('frame2');
    var frame3 = $('frame3');
    var save = $('save');
    var output = $('output');
    var context = canvas.getContext('2d');
    var videoStreamUrl = false;
    var reset = $('reset');
    var reset_img;

    var test = false;


    //функция которая будет выполнена при нажатии на кнопку захвата кадра
    var capTureMe = function (){
        test = true;
        if (!videoStreamUrl)
            alert('То-ли вы не нажали "разрешить" в верху окна, то-ли что-то не так с вашим видео стримом');
        //переворачиваем canvas зеркально по горизонтали
        context.translate(canvas.width, 0);
        context.scale(-1, 1);
          //отрисовываем на канвасе текущий кадр видео
        context.drawImage(video, 0, 0, video.width, video.height);
        //получаем data:url изображения с canvas
        //var base64dataUrl = canvas.toDataURL('img/png');
        reset_img = context.getImageData(0,0,800, 600);
        context.setTransform(1,0,0,1,0,0);
        //убираем все кастомные трансформации canvas
    }

    var cepia = function(){
        if (test === false)
            return;
        var r = [0, 0, 0, 1, 1, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 7, 7, 7, 7, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 12, 12, 12, 12, 13, 13, 13, 14, 14, 15, 15, 16, 16, 17, 17, 17, 18, 19, 19, 20, 21, 22, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 39, 40, 41, 42, 44, 45, 47, 48, 49, 52, 54, 55, 57, 59, 60, 62, 65, 67, 69, 70, 72, 74, 77, 79, 81, 83, 86, 88, 90, 92, 94, 97, 99, 101, 103, 107, 109, 111, 112, 116, 118, 120, 124, 126, 127, 129, 133, 135, 136, 140, 142, 143, 145, 149, 150, 152, 155, 157, 159, 162, 163, 165, 167, 170, 171, 173, 176, 177, 178, 180, 183, 184, 185, 188, 189, 190, 192, 194, 195, 196, 198, 200, 201, 202, 203, 204, 206, 207, 208, 209, 211, 212, 213, 214, 215, 216, 218, 219, 219, 220, 221, 222, 223, 224, 225, 226, 227, 227, 228, 229, 229, 230, 231, 232, 232, 233, 234, 234, 235, 236, 236, 237, 238, 238, 239, 239, 240, 241, 241, 242, 242, 243, 244, 244, 245, 245, 245, 246, 247, 247, 248, 248, 249, 249, 249, 250, 251, 251, 252, 252, 252, 253, 254, 254, 254, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255],

        g = [0, 0, 1, 2, 2, 3, 5, 5, 6, 7, 8, 8, 10, 11, 11, 12, 13, 15, 15, 16, 17, 18, 18, 19, 21, 22, 22, 23, 24, 26, 26, 27, 28, 29, 31, 31, 32, 33, 34, 35, 35, 37, 38, 39, 40, 41, 43, 44, 44, 45, 46, 47, 48, 50, 51, 52, 53, 54, 56, 57, 58, 59, 60, 61, 63, 64, 65, 66, 67, 68, 69, 71, 72, 73, 74, 75, 76, 77, 79, 80, 81, 83, 84, 85, 86, 88, 89, 90, 92, 93, 94, 95, 96, 97, 100, 101, 102, 103, 105, 106, 107, 108, 109, 111, 113, 114, 115, 117, 118, 119, 120, 122, 123, 124, 126, 127, 128, 129, 131, 132, 133, 135, 136, 137, 138, 140, 141, 142, 144, 145, 146, 148, 149, 150, 151, 153, 154, 155, 157, 158, 159, 160, 162, 163, 164, 166, 167, 168, 169, 171, 172, 173, 174, 175, 176, 177, 178, 179, 181, 182, 183, 184, 186, 186, 187, 188, 189, 190, 192, 193, 194, 195, 195, 196, 197, 199, 200, 201, 202, 202, 203, 204, 205, 206, 207, 208, 208, 209, 210, 211, 212, 213, 214, 214, 215, 216, 217, 218, 219, 219, 220, 221, 222, 223, 223, 224, 225, 226, 226, 227, 228, 228, 229, 230, 231, 232, 232, 232, 233, 234, 235, 235, 236, 236, 237, 238, 238, 239, 239, 240, 240, 241, 242, 242, 242, 243, 244, 245, 245, 246, 246, 247, 247, 248, 249, 249, 249, 250, 251, 251, 252, 252, 252, 253, 254, 255],

        b = [53, 53, 53, 54, 54, 54, 55, 55, 55, 56, 57, 57, 57, 58, 58, 58, 59, 59, 59, 60, 61, 61, 61, 62, 62, 63, 63, 63, 64, 65, 65, 65, 66, 66, 67, 67, 67, 68, 69, 69, 69, 70, 70, 71, 71, 72, 73, 73, 73, 74, 74, 75, 75, 76, 77, 77, 78, 78, 79, 79, 80, 81, 81, 82, 82, 83, 83, 84, 85, 85, 86, 86, 87, 87, 88, 89, 89, 90, 90, 91, 91, 93, 93, 94, 94, 95, 95, 96, 97, 98, 98, 99, 99, 100, 101, 102, 102, 103, 104, 105, 105, 106, 106, 107, 108, 109, 109, 110, 111, 111, 112, 113, 114, 114, 115, 116, 117, 117, 118, 119, 119, 121, 121, 122, 122, 123, 124, 125, 126, 126, 127, 128, 129, 129, 130, 131, 132, 132, 133, 134, 134, 135, 136, 137, 137, 138, 139, 140, 140, 141, 142, 142, 143, 144, 145, 145, 146, 146, 148, 148, 149, 149, 150, 151, 152, 152, 153, 153, 154, 155, 156, 156, 157, 157, 158, 159, 160, 160, 161, 161, 162, 162, 163, 164, 164, 165, 165, 166, 166, 167, 168, 168, 169, 169, 170, 170, 171, 172, 172, 173, 173, 174, 174, 175, 176, 176, 177, 177, 177, 178, 178, 179, 180, 180, 181, 181, 181, 182, 182, 183, 184, 184, 184, 185, 185, 186, 186, 186, 187, 188, 188, 188, 189, 189, 189, 190, 190, 191, 191, 192, 192, 193, 193, 193, 194, 194, 194, 195, 196, 196, 196, 197, 197, 197, 198, 199];

        var noise = 20;
        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);
        //фильтруем
        for (var i=0; i < imageData.data.length; i+=4) {
            // change image colors
            imageData.data[i] = r[imageData.data[i]];
            imageData.data[i+1] = g[imageData.data[i+1]];
            imageData.data[i+2] = b[imageData.data[i+2]];
            // apply noise
            if (noise > 0) {
                var noise = Math.round(noise - Math.random() * noise);
                for(var j=0; j<3; j++){
                    var iPN = noise + imageData.data[i+j];
                    imageData.data[i+j] = (iPN > 255) ? 255 : iPN;
                }
            }
        }
        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }

    function changeSinContrast(par) {
        var dPow = 4;
        var iMid = 128;

        if (par > 0 && par < iMid) {
            par = Math.sin( Math.PI * ((90-(par/dPow)) / 180)) * par;
        } else if (par >= iMid) {
            par = Math.sin( Math.PI * ((90-((256-par))/dPow)/180) ) * par;
        }
        return par;
    }

    var hdr = function(){

        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);

        var iMid = 128;
        var dPow = 3;

        for (var i=0; i < imageData.data.length; i+=4) {
            imageData.data[i+0] = changeSinContrast(imageData.data[i+0]);
            imageData.data[i+1] = changeSinContrast(imageData.data[i+1]);
            imageData.data[i+2] = changeSinContrast(imageData.data[i+2]);
        }

        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }


    var grayscale = function(){
        var er = 0; // extra red
        var eg = 0; // extra green
        var eb = 0; // extra blue
        var p1 = 0.6;
        var p2 = 0.6;
        var p3 = 0.6;
        func = 'grayscale';
        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);
        //фильтруем
        var data = imageData.data;

        for (var i = 0, n = data.length; i < n; i += 4) {
            var grayscale = data[i] * p1 + data[i+1] * p2 + data[i+2] * p3;
            data[i]   = grayscale + er; // red
            data[i+1] = grayscale + eg; // green
            data[i+2] = grayscale + eb; // blue
        }
        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }

    var nose = function(){
        var er = 0.1; // extra red
        var eg = 0.1; // extra green
        var eb = 0.1; // extra blue
        // var p1 = 1;
        var p2 = 1.2;
        var p3 = 1.2;
        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);
        //фильтруем
        var data = imageData.data;

        for (var i = 0, n = data.length; i < n; i += 4) {

            // generating random color coefficients
            var randColor1 = 0.6 + Math.random() * 0.4;
            var randColor2 = 0.6 + Math.random() * 0.4;
            var randColor3 = 0.6 + Math.random() * 0.4;

            // assigning random colors to our data
            data[i] = data[i]*p2*randColor1+er; // green
            data[i+1] = data[i+1]*p2*randColor2+eg; // green
            data[i+2] = data[i+2]*p3*randColor3+eb; // blue
        }
        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }
    var invert = function(){
        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);
        //фильтруем
        var data = imageData.data;

        for (var i = 0, n = data.length; i < n; i += 4) {

            // assigning inverted colors to our data
            data[i] = 255 - data[i]; // green
            data[i + 1] = 255 - data[i + 1]; // green
            data[i + 2] = 255 - data[i + 2]; // blue
        }
        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }

    var more = function(){

        var iBlurRate = 1.3;
        var er = 0; // extra red
        var eg = 0; // extra green
        var eb = 0; // extra blue
        var p1 = 1;
        var p2 = 1;
        var p3 = 1;

        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);
        //фильтруем
        var data = imageData.data;

        for (br = 0; br < iBlurRate; br += 1) {
            for (var i = 0, n = data.length; i < n; i += 4) {

                iMW = 4 * canvas.width;
                iSumOpacity = iSumRed = iSumGreen = iSumBlue = 0;
                iCnt = 0;

                // data of close pixels (from all 8 surrounding pixels)
                aCloseData = [
                    i - iMW - 4, i - iMW, i - iMW + 4, // top pixels
                    i - 4, i + 4, // middle pixels
                    i + iMW - 4, i + iMW, i + iMW + 4 // bottom pixels
                ];

                // calculating Sum value of all close pixels
                for (e = 0; e < aCloseData.length; e += 1) {
                    if (aCloseData[e] >= 0 && aCloseData[e] <= data.length - 3) {
                        iSumOpacity += data[aCloseData[e]];
                        iSumRed += data[aCloseData[e] + 1];
                        iSumGreen += data[aCloseData[e] + 2];
                        iSumBlue += data[aCloseData[e] + 3];
                        iCnt += 1;
                    }
                }

                // apply average values
                data[i] = (iSumOpacity / iCnt)*p1+er;
                data[i+1] = (iSumRed / iCnt)*p2+eg;
                data[i+2] = (iSumGreen / iCnt)*p3+eb;
                data[i+3] = (iSumBlue / iCnt);
            }
        }
        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
        //var base64dataUrl = canvas.toDataURL('img/png');
    }

    var rotate = function(){
        //получаем обьект внутри канваса
        var imageData = context.getImageData(0,0,canvas.width, canvas.height);


        // кладем результат фильтрации обратно в canvas
        context.putImageData(imageData, 0, 0);
    }


    //помещаем фотографию на стр
    var put = function(bul){
        if (test === false)
            return;
        if (bul == false)
            location.assign('/user/login');
        else{
            var base64dataUrl = canvas.toDataURL('foto/png');
            //можно отправить base64dataUrl на сервер
            //добавляем текстовые снимки на стр
            var img = new Image();
            img.src = base64dataUrl;
            output.insertBefore(img, output.firstChild);
        }
    }

    //рисуем лиццо
    var logo = function(){
        if (test === false)
            return;
        var logo = new Image();
        logo.src = "/template/img/w.png";
        context.drawImage(logo, 240, 400, 200, 350);
    }

    //отправляем фото на сервер
    var saveImg = function (){
        if (test === false)
            return;
        var base64dataUrl = canvas.toDataURL('img/png');
        var xhr = new XMLHttpRequest();          // Создание объекта для HTTP запроса.
        xhr.open("POST", "/foto/add/", true); // Настройка объекта для отправки синхронного GET запроса

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) { // если получен ответ
                if (xhr.status == 200) { // и если статус код ответа 200
                    // responseText - текст ответа полученного с сервера.
                    if ( xhr.responseText.indexOf("сохранилось") != -1)
                        put(true);
                    else
                        put(false);
                }
            }
        }

        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        // console.log(base64dataUrl);
        xhr.send('image='+ encodeURIComponent(base64dataUrl));                              // Отправка запроса, так как запрос является синхронным, следующая строка кода выполнится только после получения ответа со стороны сервера.
    }

    //ставим рамку
    var frame = function(str){
        console.log(test);
        if (test === false)
            return;
        var frame = new Image();
        frame.src = str;
        context.drawImage(frame, 0, 0, 800, 600);
    }

    //скидываем фильтры
    var resetFoto = function (){
        if (test === false)
            return;
        context.putImageData(reset_img, 0, 0);
    }



    button.addEventListener('click', capTureMe);
    button1.addEventListener('click', cepia);
    button2.addEventListener('click', logo);
    button3.addEventListener('click', hdr);
    button4.addEventListener('click', grayscale);
    button5.addEventListener('click', nose);
    button6.addEventListener('click', invert);
    button7.addEventListener('click', more);
    button8.addEventListener('click', rotate);
    frame1.addEventListener('click', function() { frame("/template/img/r1.png");}, false);
    frame2.addEventListener('click', function() { frame("/template/img/r4.png");}, false);
    frame3.addEventListener('click', function() { frame("/template/img/r5.png");}, false);
    save.addEventListener('click', saveImg);
    reset.addEventListener('click', resetFoto);

    //navigator.getUserMedia u window.URL.createObjectURL на разных платформах
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL.createObjectURL = window.URL.createObjectURL || window.URL.webkitCreateObjectURL || window.URL.mozCreateObjectURL || window.URL.msCreateObjectURL;
    //запрашиваем разрешение на доступ к поточному видео камеры
    navigator.getUserMedia({video:true}, function(stream){
        //разрешение получено
        //получаем  url поточного видео
        videoStreamUrl = stream;
        //устанавливаем как источник для видео
        video.srcObject = stream;
    },function(){
        console.log('что-то не так с видеостримом или пользователь запретил его использовать :P');
    });
}

// var canv=document.getElementById("img"),
//     c=canv.getContext("2d");
// function onfil(doc)
// {
//     var file=doc.files[0],
//         fileread=new FileReader();
//     fileread.onload=function()
//     {
//         var img=new Image();
//         img.src=fileread.result;
//         img.onload=function()
//         {
//             canv.width=img.width;
//             canv.height=img.height;
//             c.drawImage(img,0,0);
//             c.font="60px Arial";
//             var text="тут текст";
//             c.fillText("тут текст",canv.width/2-text.length/2*30,canv.height/2-15);
//         }
//     }
//     fileread.readAsDataURL(file);
// };
// function get()
// {
//     var link=document.createElement("a");
//     link.download="download";
//     link.href=canv.toDataURL(["image/png"]);
//     link.click();
// }