<?php

class WPBakeryShortCode_Bit14_Iconic_List extends WPBakeryShortCode {
	
	function __construct(){
		add_action( 'init', array( $this, 'mapping' ) );
		add_shortcode('iconic-list',array($this,'shortcode_html'));
	}

	function mapping(){

		// Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Iconic List', 'bit14'),
                'base' => 'iconic-list',
                'description' => __('Iconic List', 'bit14'),
                'category' => __('Bit14 Elements', 'bit14'),
                'icon' => plugin_dir_url(__DIR__) . 'assets/images/iconic-list.png',           
                'params' => array(
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'iconiclist_id',
                        'heading'       =>  __( 'ID', 'bit14' ),
                        'description'   =>  'ID for your list',
                        'param_name'    =>  'id',
                    ),
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'iconiclist_class',
                        'heading'       =>  __( 'class', 'bit14' ),
                        'description'   =>  'Class for your list',
                        'param_name'    =>  'class',
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'iconiclist_type',
                        'heading'       =>  __( 'List type', 'bit14' ),
                        'description'   =>  'Select the type of list to be displayed',
                        'param_name'    =>  'type',
                        'value'         =>  array(
                            'Horizontal'    =>  1,
                            'Vertical'      =>  2
                        )
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'iconiclist_quantity',
                        'heading'       =>  __( 'List item(s) in a row', 'bit14' ),
                        'description'   =>  'Number of list item(s) to be displayed in one row',
                        'param_name'    =>  'quantity',
                        'value'         =>  array(
                            'One'           =>  1,
                            'Two'           =>  2,
                            'Three'         =>  3
                        )
                    ),
                    array(
                        'type'          =>  'param_group',
                        'value'         =>  '',
                        'param_name'    =>  'items',
                        'params'        =>  array(
                            array(
                                'type'          =>  'attach_image',
                                'holder'        =>  'img',
                                'class'         =>  'iconiclist_icon',
                                'heading'       =>  __( 'Icon', 'bit14' ),
                                'description'   =>  'Upload your icon here',
                                'param_name'    =>  'icon',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_title',
                                'heading'       =>  __( 'Title', 'bit14' ),
                                'description'   =>  'Title of your list item',
                                'param_name'    =>  'title',
                            ),
                            array(
                                'type'          =>  'textarea',
                                'class'         =>  'iconiclist_description',
                                'heading'       =>  __( 'Description', 'bit14' ),
                                'description'   =>  'Description of your list item',
                                'param_name'    =>  'description',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_content_link',
                                'heading'       =>  __( 'Content Link', 'bit14' ),
                                'description'   =>  'Link On your content',
                                'param_name'    =>  'content_link',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_id',
                                'heading'       =>  __( 'ID', 'bit14' ),
                                'description'   =>  'ID for your list item',
                                'param_name'    =>  'id',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_class',
                                'heading'       =>  __( 'class', 'bit14' ),
                                'description'   =>  'Class for your list item',
                                'param_name'    =>  'class',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_button_text',
                                'heading'       =>  __( 'Button Text', 'bit14' ),
                                'description'   =>  'Text on button',
                                'param_name'    =>  'button_text',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_button_link',
                                'heading'       =>  __( 'Button Link', 'bit14' ),
                                'description'   =>  'Link on button',
                                'param_name'    =>  'button_link',
                            ),
                        )
                    )
                )
            )
        );
	}

	function shortcode_html($atts, $content = null){

        extract( shortcode_atts( array(
            'id'            =>  '',
            'class'         =>  '',
            'type'          =>  '',
            'quantity'      =>  '',

        ), $atts ) );

        $id = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
        $class = ( $class != '' ) ? 'list ' . esc_attr( $class ) : 'list';
        $type = ( $type != '' ) ? ( $type == 1 ) ? 'horizontal' : 'vertical' : '';
        $quantity = ( $quantity != '' ) ? esc_attr( $quantity ) : '';

        $col = ( $quantity !== '' ) ? 'col-sm-' . 12 / $quantity : 'col-sm-12' ;
        
        $html = "<div ". $id ." class='". $class . ' row '  . $type ."'>";

            $items = vc_param_group_parse_atts( $atts['items'] );
            foreach( $items as $item) {

                
                $id = ( isset($item['id']) && $item['id'] != '' ) ? 'id="' . esc_attr( $item['id'] ) . '"' : '';
                $class = ( isset($item['class']) && $item['class'] != '' ) ? 'list-item ' . esc_attr( $item['class'] ) :  'list-item';
                $icon = ( isset($item['icon']) && $item['icon'] != '' ) ? wp_get_attachment_image_src($item['icon'], "large") : '';
                $icon = ($icon !== "") ?  $icon[0] : "";
                $title = ( isset($item['title']) && $item['title'] != '' ) ? $item['title'] : '';
                $description = ( isset($item['description']) && $item['description'] != '' ) ? $item['description'] : '';
                
                
                $content_link_open = ( isset($item['content_link']) && $item['content_link'] != '' ) ? '<a href="'. $item['content_link'] .'">' : '';
                $content_link_close = ( isset($item['content_link']) && $item['content_link'] != '' ) ? '</a>' : '';



                $button = ( isset($item['button_text']) && $item['button_text'] !== "" && isset($item['button_link']) && $item['button_link'] !== "" ) ? '<a class="button" href="'. $item['button_link'] .'">'. $item['button_text'] .'</a>' : '';

                $html .= 
                '<div ' . $id . ' class="'. $class . ' ' . $col .'" >
                    <span class="icon" style="background-image:url(\''. $icon .'\');">&nbsp;</span>
                    <div class="content">
                        '. $content_link_open .'
                            <h3>'. $title .'</h3>
                            <p>'. $description .'</p>
                        '. $content_link_close .'
                        ' . $button . '
                    </div>
                </div>' ;
            }

        $html .= "</div>";

        $output = $html;
        return $output;
    }
}

new WPBakeryShortCode_Bit14_Iconic_List;