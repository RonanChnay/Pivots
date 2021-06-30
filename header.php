<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?>
<?php
$metaGeneratorContent = 'Nicepage 3.6.2, nicepage.com';
$meta_generator = '';
if ($metaGeneratorContent) {
    remove_action('wp_head', 'wp_generator');
    $meta_generator = '<meta name="generator" content="' . $metaGeneratorContent . '" />' . "\n";
    $GLOBALS['meta_generator'] = true;
}
$hideHeader = false; // default header is visible
global $hideFooter;
$hideFooter = false; // default footer is visible
$pageBlog = is_home();
$pagePost = is_single();
$pageProducts = theme_woocommerce_enabled() ? is_shop() || is_product_category() : false;
$pageProduct = theme_woocommerce_enabled() ? is_product() : false;
$pageCart = theme_woocommerce_enabled() ? is_cart() : false;
$defaultPath = $pageProducts || $pageProduct || $pageCart ? '/woocommerce' : '';
if ($pageBlog) {
    $template = 'blog';
}
if ($pagePost) {
    $template = 'post';
}
if ($pageProducts) {
    $template = 'products';
}
if ($pageProduct) {
    $template = 'product';
}
if ($pageCart) {
    $template = 'cart';
}
$wpCustomTemplate = false;
global $isWpCustomTemplate, $blog_custom_template, $post_custom_template;
if ($isWpCustomTemplate) {
    $template = $blog_custom_template ? $blog_custom_template : $post_custom_template;
    if ($template) {
        $wpCustomTemplate = true;
    }
}
if ($pageBlog || $pagePost || $pageProducts || $pageProduct || $pageCart || $wpCustomTemplate) {
    $defaultName = $pageCart ? '‌shoppingCart' : $template;
    global ${$template . "_custom_template"};
    ${$template . "_custom_template"} = ${$template . "_custom_template"} ? ${$template . "_custom_template"} : $defaultName . 'Template';
    $customPath = $wpCustomTemplate ? $template : ${$template . "_custom_template"};
    $fileWithOptions = get_template_directory() . $defaultPath . '/template-parts/' . $customPath . '/custom-template-options.php';
    if ( file_exists( $fileWithOptions ) ) {
        include_once $fileWithOptions;
    }
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" style="font-size:<?php echo apply_filters('theme_base_font_size', '16'); ?>px">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $meta_generator; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    
    
    
</head>

<body <?php body_class(); ?><?php body_style_attribute(); ?> <?php body_data_attributes(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sommmairpivots' ); ?></a>
    <?php if (!$hideHeader) { ?>
    <header class="u-clearfix u-header u-image u-shading u-header" id="sec-a1e4" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php
                                $header_image = get_header_image();
                                if ($header_image) {
                                    echo esc_url($header_image);
                                } else {
                                    ?><?php echo get_template_directory_uri(); ?>/images/Black-Honeycomb-Backgroundnbspfond-ecran-hd.jpg<?php
                                }
                            ?>');">
  <div class="u-clearfix u-sheet u-sheet-1">
    <img src="<?php
                                $header_image = get_header_image();
                                if ($header_image) {
                                    echo esc_url($header_image);
                                } else {
                                    ?><?php echo get_template_directory_uri(); ?>/images/pivots_symbol.png<?php
                                }
                            ?>" alt="" class="u-image u-image-default u-image-1" data-image-width="264" data-image-height="263">
    <h1 class="u-text u-text-white u-text-1">PIVOTS</h1>
    <a href="https://us02web.zoom.us/j/5168489614" class="u-border-2 u-border-black u-btn u-button-style u-text-black u-text-hover-white u-white u-btn-1">ZOOM</a>
    <a href="https://pocketoption.com/fr/cabinet/demo-high-low/?#tq" class="u-border-2 u-border-black u-btn u-button-style u-text-black u-text-hover-white u-white u-btn-2">FORMATION</a>
    <div class="u-border-3 u-border-black u-container-style u-expanded-width-xs u-group u-white u-group-1">
      <div class="u-container-layout u-container-layout-1">
        <h2 class="u-align-center u-text u-text-2">AGIR ÉTAPE
PAR ETAPE <br>ET TOUJOURS <br>GARDER LE FOCUS. <br>
        </h2>
      </div>
    </div>
    <h1 class="u-text u-text-body-alt-color u-text-3">Ronan Chenay <span style="font-weight: 700;"></span>
    </h1>
  </div>
</header>
    
    <?php } ?>
    <div id="content">
