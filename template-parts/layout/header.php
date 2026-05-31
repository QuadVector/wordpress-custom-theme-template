<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo QV_HOME_URL; ?>">
            <?php echo QV_SITE_NAME; ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo __('Toggle navigation', 'wordpress-custom-theme'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu(array(
                "theme_location"    => "header-menu",
                "depth"             => 2,
                "container"         => "div",
                "container_class"   => "nav navbar-nav top-nav mr-auto",
                "container_id"      => "menu",
                "menu_class"        => "nav navbar-nav",
                "fallback_cb"       => "WP_Bootstrap_Navwalker::fallback",
                "walker"            => new \QuadVector\CustomTheme\Navwalkers\Bootstrap5Navwalker(),
            ));
            ?>
        </div>
    </div>
</nav>