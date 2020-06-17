<?php
require('models/Home.php');


//My function to add a new User
if($_GET['action'] == 'home'){
    require('views/home.php');
}
