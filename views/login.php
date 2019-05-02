<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style_reg.css" media="all"/>
</head>
<body>
<div class="reg_but"><p><a href="/main/" ><img id="button" src="/resurses/home.png" alt="На главную"></a></p></div>
<div class="login">
    <h1>Вход</h1>
 <div id="error">
     <?php if (isset($errors) && is_array($errors)): ?>
         <ul>
             <?php if (is_array($errors) || is_object($errors))
                 foreach ($errors as $error): ?>
                 <span class="com" ><li> <?php echo $error; ?></li></span>
             <?php endforeach; ?>
         </ul>
     <?php endif; ?>
 </div>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required="required">
        <input type="password" name="password" placeholder="Пароль" required="required">
        <input type="submit" name="submit" class="btn1" value="Войти" />
    </form>
</div>
</body>

</html>
