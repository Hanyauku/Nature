<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// search fiel
?>

</fieldset>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Second page</title>
    </head>
    <body>
        <p>back to start</p>
        <form action="/data/searchSecond" method="post">
            <?php if(!empty($this->session->flashdata('input_error'))) {
                echo $this->session->flashdata('input_error') . '<br />';
            }?>
            <input type="email" name="email" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary mb-2">FIND</button>
        </form>
        <h1>Hello <?php echo $this->session->userdata('username') ?> </h1>
        <p>This are places of adopted rainforests. Take a look</p>
        <hr>
        <div class="locationContainer">
            <?php
                foreach ($coordinates as $coordinate) { ?>
                    <button type="submit" name="button"> <a href="/location/<?= $coordinate['id'] ?>"><?= $coordinate['sqm'] . "m " . $coordinate['latitude'] . "°N " . $coordinate['longitude'] . "°W" ?></a></button><?php
            } ?>
        </div>
    </body>
</html>
