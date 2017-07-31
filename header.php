<!DOCTYPE html>
    <html lang="<?php language_attributes() ?>">
        <head>
            <meta charset="<?php bloginfo('charset') ?>">
            <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" >
            <title><?php echo wp_title('|','','right'); bloginfo('name ')?></title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <?php wp_head();?>
        </head>
        <body>
        <!-- Start The Navigation -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="zak-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="zak-title mdl-layout-title">
            <div class="logo">
                <h3><a href="<?php bloginfo('url') ?>"><?php bloginfo('name')?></a><span>.</span></h3>
            </div>
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="zak-header-spacer mdl-layout-spacer"></div>
            <div class="zak-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->

            <div class="zak-navigation-container">
                <nav class="zak-navigation mdl-navigation">  
                    <?php add_mdl_menu();?>
                        
                        
                </nav>
            </div>
            <span class="zak-mobile-title mdl-layout-title">
               <div class="logo-mobile">
                 <h3><a href="<?php bloginfo('url') ?>"><?php bloginfo('name')?></a><span>.</span></h3>
                </div>
          </span>
            <button class="zak-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect cart" id="more-button">
                <i class="material-icons">shopping_basket</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item">5.0 Lollipop</li>
                <li class="mdl-menu__item">4.4 KitKat</li>
                <li disabled class="mdl-menu__item">4.3 Jelly Bean</li>
                <li class="mdl-menu__item">zak History</li>
            </ul>
        </div>
    </div>

    <div class="zak-drawer mdl-layout__drawer ">
        <span class="mdl-layout-title left-menu">
          <div class="logo-mobile">
                <h3><a href="<?php bloginfo('url') ?>"><?php bloginfo('name')?></a><span>.</span></h3>
            </div>
        </span>
        <nav class="mdl-navigation">
            <span class="mdl-navigation__link" href=""><i class="material-icons">account_circle</i>  Account</span>
                <a class="mdl-navigation__link" href="<?php bloginfo('url') ?>">My Account</a>
                <a class="mdl-navigation__link" href="<?php bloginfo('url') ?>">Saved Items</a>
                <a class="mdl-navigation__link" href="<?php bloginfo('url') ?>">Orders</a>
            <div class="zak-drawer-separator"></div>
            <span class="mdl-navigation__link" href="#">Categories</span>
                    <?php 
                    $categories = get_categories( array(
                                    'orderby' => 'name',
                                    'order'   => 'ASC'
                                            ) );
                    foreach($categories as $category){
                        echo '<a class="mdl-navigation__link" href="">'.$category->name.'</a>';
                    }

                    ?>
                        
                 
            <div class="zak-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Resources</span>
            <a class="mdl-navigation__link" href="">About Us</a>
            <a class="mdl-navigation__link" href="">Our Address</a>
            <a class="mdl-navigation__link" href="">Contact us</a>
        </nav>
    </div>
    <div class="zak-content mdl-layout__content">
        <a name="top"></a>
<!-- End Of Navigation -->