<?php


if(! class_exists('interiart_themple_controller')){


    class interiart_themple_controller{

        var $base_data;
        var $db_options_prefix;
        var $admin_pages = array();
        var $page_elements = array();
        var $subs = array();
        var $options = array();
        var $current;
        /**
         * themeple_controller::themeple_controller()
         *
         * @param mixed $base_data
         * @return
         */
        function interiart_themple_controller($base_data){

            new interiart_themeple_custom_menu($this);


        }

    }




}



?>