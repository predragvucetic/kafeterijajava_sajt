<?php
session_start();

    require_once "config/konekcija.php";
    include "views/fixed/head.php";
    include "views/fixed/header.php";
    include "views/fixed/nav.php";

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case "home":
                include "views/pages/home.php";
                break;
            case "about":
                include "views/pages/about.php";
                break;
            case "product":
                include "views/pages/product.php";
                break;
            case "contact":
                include "views/pages/contact.php";
                break;
            case "registration":
                include "views/pages/registration.php";
                break;
            case "login":
                include "views/pages/login.php";
                break;
            case "author":
                include "views/pages/aboutme.php";
                break;
            default:  
                include "views/pages/home.php";
                break;
        }
    }
    else{
        include "views/pages/home.php";
    }

    include "views/fixed/footer.php";

?>