<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CAMAGRU</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/css/style_reg.css" media="all"/>
    <link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="reg_but"><p><a href="/main/" ><img id="button" src="/resurses/home.png" alt="На главную"></a></p></div>
<div class="login">
    <h1>Изменение данных</h1>
    <?php if ($result): ?><p>Данные изминены!</p>
    <?php else: ?>
    <div id="error">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php if (is_array($errors) || is_object($errors))
                    foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <form method="post">
        <input type="text" name="text" placeholder="Введите имя" required="required" value=""/>
        <input type="password" name="password" placeholder="Введите пароль" required="required" value=""/>
        <input type="password" name="password2" placeholder="Введите пароль ещё раз" required="required" value=""/>
        <input type="submit" name="submit" class="btn1" value="Сохранить" />
    </form>
    <?php endif; ?>
</div>
</body>
</html>
