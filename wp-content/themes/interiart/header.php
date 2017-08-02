<?php
/*
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <!--[if IE 8]>
    <link href="<?php echo esc_url(get_template_directory_uri());?>/css/ie8.css" rel="stylesheet" type="text/css">
    <![endif]-->

    <!--[if  IE 9]>
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());?>/css/ie9.css">
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body id="bd" <?php body_class(); ?>>
    <div id="loadding"></div>
        <div class="contact-bottom">
            <div class="contact-item"></div>
            <div class="contact-text">
                <p>Vui lòng liên hệ: 098 221 6068</p>
            </div>
        </div>