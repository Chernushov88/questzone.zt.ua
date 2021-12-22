<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html>
<head>
    <meta name="description" content="квест,квеструм,квест Житомир,квест комната Житомир,квеструм Житомир,квест да винчи,квест кімната житомир, квест рум житомир,отдых в житомире, куда пойти в житомире,развлечения в житомире,відпочинок в житомирі,куди піти в житомирі,розваги житомир">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="/wp-content/themes/quest/favicon.ico" />
    <link href="/wp-content/themes/quest/fonts/fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="/wp-content/themes/quest/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/wp-content/themes/quest/css/jquery.fancybox/jquery.fancybox.css" />
    <link rel="stylesheet" href="/wp-content/themes/quest/css/questroom.css" />
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>
    <div id="qroom-wrapper">
        <div class="qroom-header">
            <div class="qroom-header_top _nclear">
                <!-- <div class="qroom-header_center">
                    <a class="qroom-header_nav_item" href="/about.php">Об игре</a>
                    <a class="qroom-header_nav_item" href="/contacts.php">Контакты</a>
                    <a target="_blank" class="qroom-header_nav_item" href="http://франшиза.квеструм.рф">Франшиза</a>

                </div> -->
                <?/*php 
                    $args = array(
                        'theme_location'  => '',
                        'menu'            => 'menu_top', 
                        'container'       => 'ul', 
                        'container_class' => '', 
                        'container_id'    => '',
                        'menu_class'      => 'qroom-header_center', 
                        'menu_id'         => 'topnav',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',                                    
                    );                  
                    wp_nav_menu( $args );
                */?>
                <div class="qroom-header_side _fl-l">
                    <a href="/" class="qroom-logo">
                        <!-- <img src="/wp-content/themes/quest/images/logo-icon.png" class="logo-icon" /> -->
                        <img src="/wp-content/themes/quest/images/new-logo.jpg" style="width: 155px;" alt='Логотип'/>
                    </a>                    
                </div>
                <div class="qroom-header_side _fl-r">
                    <div class="qroom-header_phone">
                        <i class="material-icons">phone</i> 
         <span>
            <a style="font-size: 18px; font-family: Roboto Condensed, sans-serif; color: #FFFFFF;" href="tel:+380971514542">097-15-14-542</a>
        </span>
                    </div>
                    <div class="qroom-lk_info">
                        <div class="qroom-btn qr-booking-site qroom-btn__invert" onclick="qroom.scrollToBooking();">Забронировать</div>
                    </div>
                </div>
            </div>
            <div class="qroom-header_nav">
            	<?php 
                    $args = array(
                        'theme_location'  => '',
                        'menu'            => 'header_menu', 
                        'container'       => 'ul', 
                        'container_class' => '', 
                        'container_id'    => '',
                        'menu_class'      => '', 
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',                                    
                    );                  
                    wp_nav_menu( $args );
                ?>
                <!-- <ul>
                    <li>
                        <a href="#" class="qroom-header_nav_item _js_show_quest _active">Квесты</a>
                        <ul>
                            <li>
                                <a href="/pobeg-iz-turmi.php" class="qroom-header_nav_ttip_item">Побег из Тюрьмы</a>
                            </li>
                            <li>
                                <a href="/fotolaboratoriya-prizraka.php" class="qroom-header_nav_ttip_item">Фотолаборатория Призрака</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="qroom-header_nav_item" href="/gift.php">Сертификат</a>
                    </li>
                    <li>
                        <a class="qroom-header_nav_item" href="/corporate.php">Корпоративным клиентам</a>
                    </li>
                </ul>  -->
            </div>
        </div>


