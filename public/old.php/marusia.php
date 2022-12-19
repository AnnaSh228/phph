<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<?php   
$is_image=$url == '/marusia/image';
$is_info=$url == '/marusia/info';
?>
<div class="block">Это описание кошки Маруси...<br>
Вы можете прочитать её анкету!
</div>


<ul class="nav nav-pills">
<li class="nav-item">
<a class="nav-link <?= $is_info ? "active" : '' ?>" href="/marusia/info"> <button type="button" class="btn btn-outline-dark">Описание Маруси</button> </a>
</li>
  <li class="nav-item">

<a class="nav-link <?= $is_image ? "active" : '' ?>" href="/marusia/image"> <button type="button" class="btn btn-outline-info" >Фото</button> </a>
</li>
 
</ul>

    </div>





<?php if ($is_image) {?>
  
    <img src="./views/marusia_image.jpg" alt="">
    

    <?php } else if($is_info){
      include 'marusia_info.php';

   }?>
<style>
  .block{
    margin: 15px;
padding:15px;}




</style>
   