<?php
    wp_nav_menu(array(
        "theme_location"    => "primary",
        "depth"             => 2,
        "container"         => "div",
        "container_class"   => "nav navbar-nav top-nav",
        "container_id"      => "menu",
        "menu_class"        => "nav navbar-nav"
        "fallback_cb"       => "WP_Bootstrap_Navwalker::fallback",
        "walker"            => new WP_Bootstrap_Navwalker(),
    ));
