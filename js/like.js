var im1 = document.getElementById("min1");
var im2 = document.getElementById("min2");
var im3 = document.getElementById("min3");
var im4 = document.getElementById("min4");

if (im1){
document.getElementById("min1").addEventListener("click", test1);
}
if (im2){
document.getElementById("min2").addEventListener("click", test2);
}
if (im3){
document.getElementById("min3").addEventListener("click", test3);
}
if (im4) {
    document.getElementById("min4").addEventListener("click", test4);
}
document.getElementById("like").addEventListener("click", like);

var myAJAX3 = function(pathLine, idPhoto)
{
    var res;
    var xhr = new XMLHttpRequest();		// Создание объекта для HTTP запроса.
    xhr.open("POST", pathLine, false); 		// Настройка объекта для отправки синхронного GET запроса

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) { // если получен ответ и если статус код ответа 200 i responseText - текст ответа полученного с сервера.
            if ( xhr.responseText.indexOf("true") == -1)
                res = false;
            else
                res = true;
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('idPhoto=' + idPhoto);
    return (res);
}

var myAJAX4 = function(pathLine, id_photo){
    var demo = (document.getElementById("demo"));
    var name_user = demo.getAttribute("name_user");
    var cont = document.getElementById('cont');
    var xhr = new XMLHttpRequest();

    xhr.open("POST", pathLine, false);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText) {
                var comment = new Object();
                comment = JSON.parse(xhr.responseText);
                for (i = 0; i < comment.length; i++){
                    var div = document.createElement('div');
                    div.className = "commentin";
                    div.innerHTML = '<span class="name">' + comment[i]['autor'] + "  : " + '</span>' + '<span class="com">' + comment[i]['comment'] + '</span>';
                    cont.appendChild(div);

                }
            }
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('idphoto=' + id_photo);
}


test1();

function test1() {

    var inactive_like = '/resurses/like.png';
    var active_like = '/resurses/like_aktiv.png';
    var like = document.getElementById("like").lastChild.lastChild;


    var min = document.getElementById("min1").lastChild.lastChild.lastChild;
    var big = document.getElementById("img4");


    var col = min.getAttribute("data_name");
    var status = min.getAttribute("data_status");

    var big_col = document.getElementById("count");

    var big_status = document.getElementById("like_add");

    big.removeAttribute("src");
    big.setAttribute("src", min.getAttribute("src"));
    big.setAttribute("data-value", min.getAttribute("data-value"));


    big_col.removeAttribute("data_name");
    big_col.setAttribute("data_name", min.getAttribute("data_name"));


    big_col.innerHTML = col;


   if (myAJAX3("/gallery/getlike", min.getAttribute("data-value")) === true){
       like.setAttribute("src", active_like);
   }
   else {
       like.setAttribute("src", inactive_like);
   }

    while(cont.hasChildNodes()){
        cont.removeChild(cont.firstChild);
    }

   if (myAJAX4("/gallery/arrcommit", min.getAttribute("data-value")) === true){
        console.log("Пошло");
   }
}

function test2() {

    var inactive_like = '/resurses/like.png';
    var active_like = '/resurses/like_aktiv.png';
    var min = document.getElementById("min2").lastChild.lastChild.lastChild;
    var big = document.getElementById("img4");

    var like = document.getElementById("like").lastChild.lastChild;

    var col = min.getAttribute("data_name");

    var big_col = document.getElementById("count");

    var status = min.getAttribute("data_status");


    big.removeAttribute("src");
    big.setAttribute("src", min.getAttribute("src"));
    big.setAttribute("data-value", min.getAttribute("data-value"));

    big_col.removeAttribute("data_name");
    big_col.setAttribute("data_name", min.getAttribute("data_name"));

    big_col.innerHTML = col;

    if (myAJAX3("/gallery/getlike", min.getAttribute("data-value")) === true){
        like.setAttribute("src", active_like);
    }
    else {
        like.setAttribute("src", inactive_like);
    }

    while(cont.hasChildNodes()){
        cont.removeChild(cont.firstChild);
    }

    if (myAJAX4("/gallery/arrcommit", min.getAttribute("data-value")) === true){
        console.log("Пошло");
    }

}

function test3() {
    var inactive_like = '/resurses/like.png';
    var active_like = '/resurses/like_aktiv.png';

    var like = document.getElementById("like").lastChild.lastChild;

    var min = document.getElementById("min3").lastChild.lastChild.lastChild;
    var big = document.getElementById("img4");

    var col = min.getAttribute("data_name");

    var big_col = document.getElementById("count");


    big.removeAttribute("src");
    big.setAttribute("src", min.getAttribute("src"));
    big.setAttribute("data-value", min.getAttribute("data-value"));

    big_col.removeAttribute("data_name");
    big_col.setAttribute("data_name", min.getAttribute("data_name"));

    big_col.innerHTML = col;

    if (myAJAX3("/gallery/getlike", min.getAttribute("data-value")) === true){
        like.setAttribute("src", active_like);
    }
    else {
        like.setAttribute("src", inactive_like);
    }

    while(cont.hasChildNodes()){
        cont.removeChild(cont.firstChild);
    }

    if (myAJAX4("/gallery/arrcommit", min.getAttribute("data-value")) === true){
        console.log("Пошло");
    }

}

function test4() {

    var inactive_like = '/resurses/like.png';
    var active_like = '/resurses/like_aktiv.png';

    var like = document.getElementById("like").lastChild.lastChild;

    var min = document.getElementById("min4").lastChild.lastChild.lastChild;
    var big = document.getElementById("img4");

    var col = min.getAttribute("data_name");

    var big_col = document.getElementById("count");


    big.removeAttribute("src");
    big.setAttribute("src", min.getAttribute("src"));
    big.setAttribute("data-value", min.getAttribute("data-value"));

    big_col.removeAttribute("data_name");
    big_col.setAttribute("data_name", min.getAttribute("data_name"));

    big_col.innerHTML = col;

    if (myAJAX3("/gallery/getlike", min.getAttribute("data-value")) === true){
        like.setAttribute("src", active_like);
    }
    else {
        like.setAttribute("src", inactive_like);
    }
    while(cont.hasChildNodes()){
        cont.removeChild(cont.firstChild);
    }

    if (myAJAX4("/gallery/arrcommit", min.getAttribute("data-value")) === true){
        console.log("Пошло");
    }

}

var myAJAX = function(pathLine, img)
{
    var res;
    // alert(2);
    var xhr = new XMLHttpRequest();		// Создание объекта для HTTP запроса.
    xhr.open("POST", pathLine, false); 		// Настройка объекта для отправки синхронного GET запроса

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) { // если получен ответ и если статус код ответа 200 i responseText - текст ответа полученного с сервера.
            if ( xhr.responseText.indexOf("true") == -1)
                res = false;
            else
                res = true;
            console.log(xhr.responseText);
        }
    }

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('gallery=' + img);
    return (res);
}

    function like() {
        var like = document.getElementById("like").lastChild.lastChild;
        var text = like.getAttribute("src");

        var big = document.getElementById("img4");

        var foto_id = big.getAttribute("data-value");

        var inactive_like = '/resurses/like.png';
        var active_like = '/resurses/like_aktiv.png';

        var number = parseInt(count.getAttribute('data_name'));
        var path_php;

        if (text.indexOf(active_like) == -1){
            path_php = "addlike";
            if (myAJAX(path_php, foto_id) === true)
            {
                like.setAttribute("src", active_like);
                number++;
                count.innerHTML=number;
                count.setAttribute('data_name', number);
            }
            else
                alert("Войдите в аккаунт чтобы поставить лайк!");

        }
        else{
            path_php = "dellike";
            if (myAJAX(path_php, foto_id) === true)
            {
                like.setAttribute("src", inactive_like);
                number--;
                count.innerHTML=number;
                count.setAttribute('data_name', number);
            }
            else
                alert("Войдите в аккаунт чтобы убрать лайк!");
        }

    }

