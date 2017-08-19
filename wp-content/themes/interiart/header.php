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
    <script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=a4dfd1099734b76ab13dcd859e17e2d8&data=eyJzc29faWQiOjQ5NzE4MjYsImhhc2giOiIzY2QwOTZhZGUzMWRhOGQwYjc3MzQ0ODFiZWQwZDdkZCJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
</head>
<body id="bd" <?php body_class(); ?>>
    <div class="row-under-slide"></div>