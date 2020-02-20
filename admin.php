<?php
session_start();

    include "config/konekcija.php";

    include "views/admin/fixed/head.php";
    include "views/admin/fixed/sidebar.php";
    include "views/admin/fixed/nav.php";

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'users':
                include "views/admin/pages/users.php";
                break;
            case 'posts':
                include "views/admin/pages/posts.php";
                break;
            case 'gallery':
                include "views/admin/pages/gallery.php";
                break;
        }
    }
    else{
        include "views/admin/pages/users.php";
    }

    include "views/admin/fixed/footer.php";