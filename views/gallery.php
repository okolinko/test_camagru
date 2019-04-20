<?php include ROOT.'/views/header.php';?>
<div class="wrapper">
<ul class="min">
    <?php $i = 1; foreach ($gallerylist as $foto): ?>
    <div id="<?php $i; echo "min".$i;?>" class="foto" name="<?php echo $foto['id'] ?>">
        <li><a href="#img<?php echo $foto['id']; ?>">

                <img id="foto<?php $i += 1; echo $i;?>" data_name="<?php $colLike = intval($foto['count_like']); echo $colLike;?>"
                     data-value="<?php $foto_id = intval($foto['id']); echo $foto_id;?>"

                     class="min_img" src="/resurses/gallery/<?php echo $foto['img']?>"></a></li></div>
    <?php endforeach; ?>
</ul>
<div class="images">
    <div>
            <div class="my_like">
                <div class="my_count">
                <div id="like" ><button type="button">
                        <p id="count" data_name="<?php echo $colLike; ?>"><?php echo $colLike ?> </p>
                        <img id="like_add" class="like_add"   src="/resurses/like_aktiv.png"></button></div>
            </div>
                    <div id="demo" <p data-value="<?php $foto_id = intval($foto['id']); echo $foto_id;?> " name_user="<?php echo $name_user; ?>"></p></div>

    </div>
    <div id="foto"><img id="img4" class="foto_big" alt="" src="/resurses/gallery/<?php echo $foto['img']?>"></div>
</div>
</div>
<div class="pagination_centr"><?php echo $pagination->get(); ?></div>
<div class="comment_foto" >
    <div id="addComment">
        <textarea type="text" cols="22" rows="3"   id="comment" placeholder="Комментарий" class="textbox"></textarea>

        <br>
        <input type="submit" id="submit" value="Отправить" class="button" required/>
    </div>
    <div id="cont">
        <?php foreach ($commentsList as $comment): ?>
            <div class="commentin"><span class="name"><?php echo $comment['autor']."  :  " ?></span> <span class="com" ><?php  echo $comment['comment'] ?></span></div>
        <?php endforeach; ?>
    </div>
</div>
</body>
<script type="text/javascript" src="/js/like.js"></script>
<script type="text/javascript" src="/js/commit.js"></script>
</html>
