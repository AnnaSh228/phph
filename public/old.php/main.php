<?php   
$is_image=$url == '/marusia/image';
$is_image=$url == '/tamara/image';
$is_info=$url == '/marusia/info';
$is_info=$url == '/tamara/info';
$is_info=$url == '/marusia';
$is_info=$url == '/tamara';

?>
<ul class="list-group"style="margin-top:20px;">
<li class="list-group-item">
<a href="/marusia"><button type="button" class="btn btn-secondary">Маруся</button></a>
<a href="/marusia/info"><button type="button" class="btn btn-outline-dark">Описание Маруси</button></a>
    <a class="nav-link <?= $is_image ? "active" : '' ?>" href="/marusia/image">
    <button type="button" class="btn btn-outline-info">Фото</button> 
    </a></li>
 



<li class="list-group-item"> <a href="/tamara"><button type="button" class="btn btn-warning">Тамара</button><a>

<a href="/tamara/info"><button type="button" class="btn btn-outline-warning">Описание Тамары</button></a>

  
    <a class="nav-link <?= $is_image ? "active" : '' ?>" href="/tamara/image">
    <button type="button" class="btn btn-outline-info">Фото</button> 
    </a></li>
 
</ul>





<?php if ($is_image) {?>
    <img src="/views/tamara_image.jpg" alt="">
    <?php } else if($is_info){?>
        kijdikjedjiejgf
        <?php }
        ?>

   