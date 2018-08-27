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
        <form action="/data/search" method="post">
            <!-- add validation -->
            <input type="email" name="email" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary mb-2">FIND</button>
        </form>
        <h1>Hello <?php echo $this->session->userdata('username') ?> </h1>
        <p>This are places of adopted rainforests. Take a look</p>
        <hr>
        <div class="locationContainer">
            <?php
                foreach ($coordinates as $coordinate) { ?>
                    <button type="submit" name="button"> <a href="/location/<?= $coordinate['id'] ?>"><?= $coordinate['sqm'] . "m " . $coordinate['latitude'] . " " . $coordinate['longitude'] ?></a></button><?php
            } ?>
        </div>
    </body>
</html>
