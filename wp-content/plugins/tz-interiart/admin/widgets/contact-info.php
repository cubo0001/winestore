<?php
 /* *
  * widgets contact info
  **/
  class interiart_contact_info extends WP_Widget{

      /*function construct*/
      public function __construct() {
          parent::__construct(
            'contact_info', esc_html__('Contact info','interiart'),
             array('description'=> esc_html__('Display Contact info', 'interiart'))
          );
      }

      /**
       * font-end widgets
      */
      public function widget($args, $instance) {
          extract($args);
          $interiart_title = apply_filters('widget_title', $instance['interiart_title']);

          echo balanceTags($before_widget);

          if($interiart_title) {
              echo balanceTags($before_title).esc_html($interiart_title).balanceTags($after_title);
          }

      ?>
          <div class="tzwidget-contact">
            <?php  if($instance['interiart_description']): ?>
              <p class="tzContact_description"> <?php  echo esc_html($instance['interiart_description']);  ?> </p>
            <?php  endif; ?>
              <?php  if($instance['interiart_address']): ?>
                  <span class="tzContact_address"><i class="fa fa-map-marker"></i><?php  echo esc_html($instance['interiart_address']);  ?></span>
              <?php  endif; ?>
            <?php  if($instance['interiart_phone']): ?>
              <span class="tzContact_phone"><i class="fa fa-phone"></i><?php echo esc_html($instance['interiart_phone']); ?></span>
            <?php  endif; ?>
            <?php if($instance['interiart_email']): ?>
                <span class="tzContact_email"><i class="fa fa-envelope-o"></i><?php echo esc_html($instance['interiart_email']); ?></span>
            <?php endif; ?>
              <?php if($instance['interiart_website']): ?>
                  <span class="tzContact_website"><i class="fa fa-globe"></i><?php echo esc_html($instance['interiart_website']); ?></span>
              <?php endif; ?>
          </div>
      <?php
          echo balanceTags($after_widget);
      }

      /**
       * Back-end widgets form
      */
      public function form($instance){
          $instance =   wp_parse_args($instance,array(
              'interiart_title'       =>  'Contact info',
              'interiart_description' =>  'Description',
              'interiart_address'     =>  'Ha Noi, Viet Nam',
              'interiart_phone'       =>  '+0123456789',
              'interiart_email'       =>  'info@templaza.com',
              'interiart_website'     =>  'templaza.com',
          ));
          ?>
          <p>
              <label for=<?php echo esc_attr($this->get_field_id('interiart_title')); ?>><?php  esc_html_e('Title:','interiart') ; ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('interiart_title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('interiart_title')); ?>" value="<?php echo esc_attr($instance['interiart_title']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('interiart_description')); ?>"><?php  esc_html_e('Description','interiart'); ?></label>
              <textarea name="<?php echo esc_attr($this->get_field_name('interiart_description')); ?>" id="<?php echo esc_attr($this->get_field_id('interiart_description')); ?>" class="widefat" placeholder="<?php echo esc_attr($instance['interiart_description']); ?>"></textarea>
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('interiart_address')); ?>"><?php  esc_html_e('Address:','interiart'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('interiart_address')) ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('interiart_address')) ?>" value="<?php echo esc_attr($instance['interiart_address']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('interiart_phone')); ?>"><?php  esc_html_e( 'Phone:', 'interiart' ); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('interiart_phone')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('interiart_phone')); ?>" value="<?php echo esc_attr($instance['interiart_phone']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('interiart_email')) ?>"><?php  esc_html_e('Email:', 'interiart'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('interiart_email')); ?>" name="<?php echo esc_attr($this->get_field_name('interiart_email')); ?>" class="widefat" value="<?php echo esc_attr($instance['interiart_email']); ?>" />
          </p>
          <p>
              <label for="<?php echo esc_attr($this->get_field_id('interiart_website')) ?>"><?php  esc_html_e('Website:', 'interiart'); ?></label>
              <input type="text" id="<?php echo esc_attr($this->get_field_id('interiart_website')); ?>" name="<?php echo esc_attr($this->get_field_name('interiart_website')); ?>" class="widefat" value="<?php echo esc_attr($instance['interiart_website']); ?>" />
          </p>
      <?php
      }

      /**
      * function update widget
      */
      public function update( $new_instance, $old_instance ) {
          $instance                             =   $old_instance;
          $instance['interiart_title']            =   $new_instance['interiart_title'];
          $instance['interiart_description']      =   $new_instance['interiart_description'];
          $instance['interiart_address']          =   $new_instance['interiart_address'];
          $instance['interiart_phone']            =   $new_instance['interiart_phone'];
          $instance['interiart_email']            =   $new_instance['interiart_email'];
          $instance['interiart_website']          =   $new_instance['interiart_website'];
          return $instance;
      }
  }
  function interiart_register_contact_info(){
      register_widget('interiart_contact_info');
  }
  add_action('widgets_init','interiart_register_contact_info');
?>