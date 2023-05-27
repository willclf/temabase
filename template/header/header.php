<header>
    <div class="cabecalho">
        <img src="<?php echo get_img('logo.png'); ?>" alt="logo">
        <nav>
            <?php wp_nav_menu(array(
                'theme_location' => 'Menu Principal'
            ));?>
        </nav>
    </div>
</header>