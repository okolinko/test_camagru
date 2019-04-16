

var comment = document.getElementById('comment');
var submit = document.getElementById('submit');


var foto = document.getElementById("img4");

var cont = document.getElementById('cont');

var id_foto = foto.getAttribute("data-value");

    console.log(cont);

var addComment = function()
{
    var text = comment.value;
    if (text.length > 0)
    {
        var xhr = new XMLHttpRequest();          // Создание объекта для HTTP запроса.
        xhr.open("POST", "/gallery/comment/", true); // Настройка объекта для отправки синхронного GET запроса

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) { // если получен ответ  и если статус код ответа 200
                    if ( xhr.responseText.indexOf("ввойдите в систему") == -1){// responseText - текст ответа полученного с сервера.
                        var div = document.createElement('div');
                        // console.log(xhr.responseText);
                        div.innerHTML = '<span class="commentin">'+xhr.responseText+'</span>: '+'<plaintext>' + text + '</plaintext>';
                        // cont.appendChild(div);
                    }
                    else
                        location.assign('/user/login');
                }

        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        alert('comment=' + text)
        xhr.send('comment=' + text + '&foto=' + id_foto);
        // Отправка запроса, так как запрос является синхронным, следующая строка кода выполнится только после получения ответа со стороны сервера.
    }

}

submit.addEventListener('click', addComment);