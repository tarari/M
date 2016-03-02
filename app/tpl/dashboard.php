<?php
  $menu=array(
      'Inici'=>APP_W.'dashboard',
      'Publica'=>APP_W.'dashboard/publish',
      'Sortir'=>APP_W.'home/logout'
    );
  $adm=array(
    'Usuaris'=>APP_W,'users',
    'Anuncis'=>APP_W,'adverts'
    );
  include 'common.php';
?><nav class="navbar navbar-inverse">
    <?php
      MMenu::create($menu);
      MMenu::create($adm);
    ?>
  </nav>
  <div class="admin">
  <?php
    if ((isset($_COOKIE['rol']))&&($_COOKIE['rol']==3)){
      MButton::create($adm);
    }
  ?>
  </div>
  <h2>Publicats</h2>
  <div class="container">
  
  </div>
