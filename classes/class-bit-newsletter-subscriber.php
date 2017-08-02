<?php

class WPBakeryShortCode_Bit14_Newsletter_Subscriber extends WPBakeryShortCode {
	
	function __construct(){
		add_action( 'init', array( $this, 'mapping' ) );
		add_shortcode('newsletter-subscriber',array($this,'shortcode_html'));
	}

	function mapping(){

		// Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Newsletter Subscriber', 'bit14-'),
                'base' => 'newsletter-subscriber',
                'description' => __('Newsletter subscriber form', 'bit14-'), 
                'category' => __('Bit14 Elements', 'bit14-'),   
                'icon' => plugin_dir_url(__DIR__) . 'assets/images/newsletter-subscriber.png',           
                'params' => array(
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'newslettersubscriber_title',
                        'heading'       =>  __( 'Title', 'bit14-' ),
                        'description'   =>  'Title of your form',
                        'param_name'    =>  'title',
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'newslettersubscriber_namefield',
                        'heading'       =>  __( 'Display name field', 'bit14-' ),
                        'description'   =>  'Choose whether name field should be displayed or not',
                        'param_name'    =>  'name',
                        'value'         =>  array(
                            'Yes'   =>  'YES',
                            'No'    =>  'NO'
                        )
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'newslettersubscriber_theme',
                        'heading'       =>  __( 'Colour Theme', 'bit14-' ),
                        'description'   =>  'Colour theme of your form',
                        'param_name'    =>  'theme',
                        'value'         =>  array(
                            'Dark'   =>  'Dark',
                            'Light'    =>  'Light'
                        )
                    ),
                    array(
                        'type'          =>  'textarea',
                        'class'         =>  'newslettersubscriber_description',
                        'heading'       =>  __( 'Description', 'bit14-' ),
                        'description'   =>  'Description of your form',
                        'param_name'    =>  'description',
                    ),
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'newslettersubscriber_group',
                        'heading'       =>  __( 'Subscriber group', 'bit14-' ),
                        'description'   =>  'Group of your subscriber\'s list.',
                        'param_name'    =>  'group_name',
                    ),
                )
            )
        );
	}

	function shortcode_html($atts, $content = null){

        extract( shortcode_atts( array(
            'title'         =>  '',
            'name'     =>  '',
            'description'   =>  '',
            'group_name'         =>  '',
            'theme'         =>  ''
        ), $atts ) );

        // $id = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
        // $class = ( $class != '' ) ? 'newsletter-subscriber ' . esc_attr( $class ) : 'newsletter-subscriber ';
        $title = ( $title != '' ) ? esc_attr( $title ) : '';
        $name = ( $name != '' ) ? $name : "YES";
        $description = ( $description != '' ) ? esc_attr( $description ) : '';
        $group_name = ( $group_name != '' ) ? esc_attr( $group_name ) : 'public';
        $theme = ( $theme != '' ) ? esc_attr( $theme ) : 'Dark';
    
        
        $output = '<div class="newsletter_subscriber '. $theme .'">';
            $output .= '<h2>' . $title . '</h2>';
            $output .= do_shortcode( '[email-subscribers namefield="'. $name .'" desc="'. $description .'" group="'. $group_name .'"]' );
        $output .= '</div>';
        
        return $output;
    }
}

new WPBakeryShortCode_Bit14_Newsletter_Subscriber;