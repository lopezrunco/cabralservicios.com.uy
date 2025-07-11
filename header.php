<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Meta -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="author" content="Damián López Runco">
    <link rel="author" href="https://github.com/lopezrunco">
    <link rel="shortcut icon" href="/wp-content/themes/cabral-theme/assets/images/favicon.ico">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php 
    wp_head(); 

    require_once get_template_directory() . '/functions.php';
    if (file_exists(COMPANY_DATA_PATH)) {
        $json_data = file_get_contents(COMPANY_DATA_PATH);
        $company_data = json_decode($json_data, true);
    }
    
    ?>
</head>

<body>
    <header class="fixed-top">
        <nav class="navbar navbar-expand-xl bg-white py-lg-0">
            <div class="container py-4 fade-in delay-level1">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="main-logo" alt="Logo de Cabral" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" />
                </a>
                <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars menu-icon"></i>
                </button>
                <div class="collapse navbar-collapse py-3 pt-5 pt-lg-3 justify-content-end" id="navbarSupportedContent">

                    <?php
                    // Main menu
                    wp_nav_menu(array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul class="navbar-nav mb-2 mb-lg-0 gap-3">%3$s</ul>',
                        'fallback_cb' => false
                    ));
                    ?>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </nav>
    </header>



    <div class="main-wrapper">
        <?php if (!is_front_page() && !is_404()) : ?>
            <header class="page-title">
                <div class="container fade-in delay-level2">
                    <p class="heading">
                        <i class="me-3 fa-solid fa-location-dot"></i> Inicio |
                        <?php
                            if (function_exists('is_shop') && is_shop()) {
                                echo 'Tienda';
                            } elseif (is_search()) {
                                printf('Resultados: %s', get_search_query());
                            } elseif (is_archive()) {
                                the_archive_title();
                            } elseif (is_single()) {
                                the_title();
                            } elseif (is_page()) {
                                the_title();
                            } else {
                                the_title();
                            }
                        ?>
                    </p>
                </div>
            </header>
        <?php endif; ?>