<?php include ROOT.'/views/header.php';?>
<?php if (isset($_SESSION['user_name'])): ?>
    <div style="right:"> <span class="com"> Приветствуем вас,  <?php echo ' '.$user['user_name'].'!';?></span></div>
<?php //else: ?>
<!--    <div><span class="com"> Приветствуем вас, </span><span style="color: blueviolet">Гость</span>!</div>-->
<?php endif; ?>
<div class="info_flex">
    <div class="email"><p class="com"> Email: <?php echo $user['email']?></p></div>
<!--    <a class="edit" href="/account/edit">Изменить пароль</a>-->
    <form action="/account/edit/" method="post">
        <input type="submit" value="Изменить пароль" />
    </form>
    <br>
<!--    <a class="edit" href="/account/delete">Удалить аккаунт</a>-->
    <form action="/account/delete/" method="post">
        <input type="submit" value="Удалить аккаунт" />
    </form>
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