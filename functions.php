<?php
add_action("init", function () {
    if (!is_admin() && $GLOBALS["pagenow"] != "wp-login.php") {
        wp_enqueue_style("style-main", get_stylesheet_directory_uri() . "/css/main.css");
        wp_enqueue_style("style-bootstrap", get_stylesheet_directory_uri() . "/css/bootstrap.min.css");

        wp_enqueue_script("jquery");
        wp_enqueue_script("script-main", get_stylesheet_directory_uri() . "/js/main.js", 100);
        wp_enqueue_script("script-bootstrap", get_stylesheet_directory_uri() . "/js/bootstrap.min.js", 100);
    }

    register_nav_menus(array(
        "primary" => __("Primary Menu"),
    ));
});