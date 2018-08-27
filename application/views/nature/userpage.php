<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Second page</title>
    </head>
    <body>
        <p>back to start</p>
        <form action="data/search" method="post">
            <!-- add validation -->
            <input type="email" name="email" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary mb-2">FIND</button>
        </form>
        <h1>Hello <!-- add user name --> </h1>
        <p>This are places of adopted rainforests. Take a look</p>
        <hr>
        <div class="locationContainer">

        </div>
    </body>
</html>
