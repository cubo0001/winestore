<?php
$interiart_footer_col     =   ot_get_option('interiart_footerType3_columns',4);
$interiart_footer_width1  =   ot_get_option('interiart_footerType3_width1',3);
$interiart_footer_width2  =   ot_get_option('interiart_footerType3_width2',3);
$interiart_footer_width3  =   ot_get_option('interiart_footerType3_width3',3);
$interiart_footer_width4  =   ot_get_option('interiart_footerType3_width4',3);

$interiart_facebook       = ot_get_option('interiart_TzFooterType3_facebook');
$interiart_twitter        = ot_get_option('interiart_TzFooterType3_twitter');
$interiart_tumblr         = ot_get_option('interiart_TzFooterType3_tumblr');
$interiart_linkedin       = ot_get_option('interiart_TzFooterType3_linkedin');
$interiart_youtube        = ot_get_option('interiart_TzFooterType3_youtube');
$interiart_dribbble       = ot_get_option('interiart_TzFooterType3_dribbble');
$interiart_behance        = ot_get_option('interiart_TzFooterType3_behance');
$interiart_skype          = ot_get_option('interiart_TzFooterType3_skype');
$interiart_pinterest      = ot_get_option('interiart_TzFooterType3_pinterest');
$interiart_google_plus    = ot_get_option('interiart_TzFooterType3_google_plus');

?>
<footer class="tzFooter tzFooter-Type-3">
    <div class="tzFooterTop">
        <div class="container">
            <div class="row">
                <?php
                if(isset($interiart_footer_col) && $interiart_footer_col!=""):
                    for($i=0;$i<$interiart_footer_col;$i++):
                        $j = $i +1;
                        if($i==0){
                            $interiart_col = $interiart_footer_width1;
                        }elseif($i==1){
                            $interiart_col = $interiart_footer_width2;
                        }elseif($i==2){
                            $interiart_col = $interiart_footer_width3;
                        }elseif($i==3){
                            $interiart_col = $interiart_footer_width4;
                        }
                        ?>
                        <div class="col-md-<?php echo esc_attr($interiart_col); ?> footerattr">
                            <?php
                            if(is_active_sidebar("interiart-footer-type3-".$j) ):
                                dynamic_sidebar("interiart-footer-type3-".$j);
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                    <?php
                    endfor;
                endif;
                ?>
            </div>
        </div><!--end class container-->
    </div>

    <div class="tzFooterBottom">
        <div class="container">
            <div class="tzCopyright">
                <?php
                $interiart_footer_text = ent2ncr(ot_get_option('interiart_copyright'));
                if($interiart_footer_text == ''){
                    echo '<p>Copyright &copy Templaza</p>';
                }else{
                    echo balanceTags($interiart_footer_text );
                }
                ?>
            </div>
        </div><!--end class container-->
    </div><!--end class footerbottom -->
</footer>