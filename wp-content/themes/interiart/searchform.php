<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="icon-search">&nbsp;</label>
        <label class="assistive-text assistive-tzsearch"><?php  esc_html_e( 'Search', 'interiart'); ?></label>
        <input type="text" class="field Tzsearchform inputbox search-query" name="s" placeholder="<?php esc_attr_e( 'Search...', 'interiart');?>" />
        <input type="submit" class="submit searchsubmit" name="submit" value="<?php esc_attr_e( 'Search', 'interiart'); ?>" />
        <span aria-hidden='true' class='icon_search'></span>
    </form>
