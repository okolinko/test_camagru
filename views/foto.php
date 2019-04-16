<?php include ROOT.'/views/header.php';?>
<div class="foto_flex">
        <div  id="el_1"> <button type="button" id="button" name="button"><img  width=50px src="/resurses/zat.png" width=100% ></button></div>
        <div class="elem_foto_cam" id="el_2"><video id="video" width="800" height="600" autoplay="autoplay"></video></div>
    <div id="el_3"> <canvas id="canvas" width="800" height="600"></canvas></div>
    <div id="el_4">
        <div class="conteiner">
            <button type="button" id="button1" name="button1">Sepia</button>
            <button type="button" id="button3" name="button3">HDR</button>
            <button type="button" id="button4" name="button4">Gray</button>
            <button type="button" id="button5" name="button5">Noise</button>
            <button type="button" id="button6" name="button6">Invert</button>
            <button type="button" id="button7" name="button7">More</button>
            <button type="button" id="button2" name="button2"><img  width="50px" src="/template/img/w.png"></button>
            <button type="button" id="frame" name="frame"><img  height="50px" src="/template/img/r1.png"></button>
            <button type="button" id="frame2" name="frame"><img  height="50px" src="/template/img/r4.png"></button>
            <button type="button" id="frame3" name="frame"><img  width="50px" src="/template/img/r5.png"></button>
            <button type="button" id="button8" name="button8">Rotate</button>
            <button type="button" id="reset" name="frame">Reset</button>
            <button type="button" id="save" name="save">Save</button>
        </div>
    </div>
</div>
<section class="wrap">
    <div id="output"></div>
</section>
<?php include ROOT.'/views/footer.php';?>
</body>
<script src="/js/foto.js"></script>
</html>