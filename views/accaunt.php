<?php include ROOT.'/views/header.php';?>
<?php include_once ROOT.'/template/func/download.php';?>
<?php if (isset($_SESSION['user_name'])): ?>
    <div style="right:"> <span class="com"> Приветствуем вас,</span><span style="margin-left: 1%" class="user">  <?php echo ' '.$user['user_name'].'!';?></span></div>
<?php //else: ?>
<!--    <div><span class="com"> Приветствуем вас, </span><span style="color: blueviolet">Гость</span>!</div>-->
<?php endif; ?>
<div class="info_flex">
    <div class="email">
        <div class="em"> <p style="width: 100%; margin-left: -10%; margin-top: -15%" class="com"> Email:<?php echo $user['email']?></p></div>
    </div>
    <div class="email">
        <form action="/account/edit/" method="post">
            <input style="width: 100%; margin-left: -45%" type="submit" value="Изменить пароль" />
    </form>
    </div>
    <div class="email">
        <form action="/account/delete/" method="post">
            <input style="width: 100%; margin-left: -30%" type="submit" value="Удалить аккаунт" />
        </form>
    </div>
</div>
    <div class="down_im">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Загрузить файл!">
        </form>
        <?php
        // если была произведена отправка формы
        if(isset($_FILES['file'])) {
            // проверяем, можно ли загружать изображение
            $check = can_upload($_FILES['file']);

            if($check === true){
                // загружаем изображение на сервер
                make_upload($_FILES['file']);
                echo "<strong>Файл успешно загружен!</strong>";
            }
            else{
                // выводим сообщение об ошибке
                echo "<strong>$check</strong>";
            }
        }
        ?>
    </div>

<section class="wrap">
    <div class="foto_ac" >
    <?php if (!empty($foto)): ?>
        <?php foreach ($foto as $foto_list): ?>

                <div class="flex_acc">
                    <img class="accaunt_foto" src="/resurses/gallery/<?php echo $foto_list['img']?>">
                    <img name="delete"  class="delete" id="<?php echo $foto_list['id'] ?>" src="/resurses/dell_foto.png">
                </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</section>
<?php include ROOT.'/views/footer.php';?>
<script type="text/javascript" src="/js/delete.js"></script>
</body>
</html>