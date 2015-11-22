<!DOCTYPE HTML>
<html>

<head profile="<?php print $grddl_profile;?>">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
        print $styles;
        print $scripts;
        global $base_url;
    ?>
    <style type="text/css">
        <?php if (isset($googlewebfonts)): print $googlewebfonts; endif; ?>
        <?php if (isset($theme_setting_css)): print $theme_setting_css; endif; ?>
        <?php
        // custom typography
        if (isset($typography)): print $typography; endif;
        ?>
        <?php if (isset($custom_css)): print $custom_css; endif; ?>
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
</head>
<body data-spy="scroll" data-target=".navigation" class="home map-vertical <?php print theme_get_setting('theme', 'citilights'); ?> <?php print theme_get_setting('layout', 'citilights'); ?> <?php print $classes; ?>" <?php if(theme_get_setting('layout', 'citilights') == "boxed-layout") print 'style="background-image: url('.base_path().path_to_theme().'/images/patterns/'.theme_get_setting('layout_bg', 'citilights').'.png); background-repeat: repeat;"'; ?> <?php print $attributes;?>>
<?php print $page_top; ?>
<?php print $page; ?>
<?php
print $page_bottom;
if (isset($footer_code)): print $footer_code; endif;
?>
</body>

</html>