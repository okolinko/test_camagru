<?php include ROOT.'/views/header.php';?>
<?php if (isset($_SESSION['user_name'])): ?>
    <div style="right:">Приветствуем вас,  <?php echo ' '.$user['user_name'].'!';?></div>
<?php else: ?>
    <div>Приветствуем вас, <span style="color: blueviolet">Гость</span>!</div>
<?php endif; ?>
<div class="info_flex">
    <div class="email">Email: <?php echo $user['email']?></div>
    <a class="edit" href="/account/edit">Изменить пароль</a>
    <br>
    <a class="edit" href="/account/delete">Удалить аккаунт</a>
</div>
<?php include ROOT.'/views/footer.php';?>
</body>
</html>