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
                    <div id="demo" <p data-value="<?php $foto_id = intval($foto['id']); echo $foto_id;?> "></p></div>

    </div>
    <div id="foto"><img id="img4" class="foto_big" alt="" src="/resurses/gallery/<?php echo $foto['img']?>"></div>
</div>
</div>
<div class="comment_foto" >
    <div id="cont">
        <?php foreach ($commentsList as $comment): ?>
            <div class="commentin"><span class="name"><?php echo $comment['autor'] ?></span>: <?php  echo $comment['comment'] ?></div>
        <?php endforeach; ?>
    </div>
<div id="addComment">
    <input type="text"   id="comment" placeholder="Комментарий" class="textbox" required/>
    <input type="submit" id="submit" value="Отправить" class="button" required/>
</div>
<!--</div>-->
</div>
<div class="pagination_centr"><?php echo $pagination->get(); ?></div>
<?php include ROOT.'/views/footer.php';?>
</body>
<script type="text/javascript" src="/js/like.js"></script>
<script type="text/javascript" src="/js/commit.js"></script>
</html>
