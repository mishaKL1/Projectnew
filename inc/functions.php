<?php

function get_menu(array $pages){
    $menu_items = '';
    foreach($pages as $page_name => $page_url){
        $menu_items .= '<li class="nav-item"><a class="nav-link" href="' . $page_url . '">' . $page_name . '</a></li>';
    }
    return $menu_items;
}


?>