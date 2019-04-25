document.getElementById('submit').addEventListener('click', function () {
    var text = document.getElementById('comment').value;

    if (text.length > 0 && text.length < 100) {

        var id_photo = document.getElementById("img4").getAttribute('data-value');

        var demo = (document.getElementById("demo"));
        var name_user = demo.getAttribute("name_user");
        var cont = document.getElementById('cont');
        var id_user = demo.getAttribute("id_us");

        var xhr = new XMLHttpRequest();

        xhr.open("POST", "/gallery/comment", false);
console.log(id_user);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText && id_user > 0) {
                    var div = document.createElement('div');
                    // console.log(xhr.responseText);
                    div.className = "commentin";
                    div.innerHTML = '<span class="name">' + name_user + "  : " + '</span>' + '<span class="com">' + text + '</span>';
                    cont.appendChild(div);
                }
                else {
                    alert("войдите в аккаунт чтобы оставить коментарий!");
                }
                // var array = JSON.parse(xhr.responseText);
                //
                // console.log(array);
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('comment=' + JSON.stringify(text) + '&foto=' + id_photo);
    }
    else{
        alert("Коментарий не может быть пустым, или быть длинее 100 символов")
    }
});

