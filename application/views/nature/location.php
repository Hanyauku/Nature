<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// search fiel
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
        <!-- add share button at header -->
        <div class="media">
            <!-- show pictures $photos -->
        </div>

        <h2><?= $coordinates['latitude'] . "°N / " . $coordinates['longitude'] . "°W"?></h2>
        <p>OWNER</p>
        <h4> <?= $this->session->userdata['username'] ?></h4>
        <p>SQUARE METERS</p>
        <h4> <?= $coordinates['sqm'] . "m2" ?></h4>
        <p>ADOPTED A TOTAL OF</p>
        <h4> <?= $sum['sum'] . "m2" ?></h4>
     </body>
 </html>
