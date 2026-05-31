<?php

// constants
define("QV_TEMPLATE_DIRECTORY", get_template_directory());
define("QV_TEMPLATE_DIRECTORY_URI", get_template_directory_uri());
define("QV_STYLESHEET_DIRECTORY_URI", get_stylesheet_directory_uri());
define("QV_STYLESHEET_DIRECTORY", get_stylesheet_directory());
define("QV_HOME_URL", home_url("/"));
define("QV_HOME_PAGE_ID", get_option("page_on_front"));
define("QV_SITE_NAME", get_bloginfo("name"));

// composer autoloader
require_once(QV_TEMPLATE_DIRECTORY . "/vendor/autoload.php");

// main init
\QuadVector\CustomTheme\Theme::init();
