<?php

// add_action( 'add_meta_boxes', 'jt_post_meta' );
// add_action( 'save_post', 'jt_meta_save',10,3 );


/*---------------------------------------------*/
/*
function jt_post_meta() {
    add_meta_box( 'jt_photo_gallery', 'Специалист', 'jt_photo_gallery_box', 'jt_photo_gallery','normal', 'high'  );
}

function jt_photo_gallery_box( $post ) {
   
	$custom_meta = get_post_meta($post->ID, '_photo_gallery_data',true);	
	echo '<h4>Передаем урл фото через </4>';
	echo '<div class="li_box_special">';
	echo '<textarea  rows="8" cols="100" name="photo_gallery_data" placeholder="/wp-content/uploads/2017/08/background-s.jpg" >'.$custom_meta.'</textarea>';
	echo '</div>';	
}




function jt_meta_save($post_id, $post){
  
	 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	    return $post_id;

	 if ( !('jt_photo_gallery' == $post->post_type) ) 
	 return $post_id; 
		
	 if ( !current_user_can( 'edit_post', $post_id ) )
	 return $post_id;

	 if ( ('jt_photo_gallery' == $post->post_type) ) { 
	 
	 $meta_tabs = array('photo_gallery_data');
		  
		foreach ($meta_tabs as $key => $value){ 
			$promo_actions = $_POST[$value];
			$value_meta = '_'.$value;
			$old_meta = get_post_meta($post_id, $value_meta, true);
			if (!empty($promo_actions)){
				if(!empty($old_meta)){
					update_post_meta( $post_id, $value_meta, $promo_actions );
				} else {
					add_post_meta( $post_id, $value_meta, $promo_actions );
				} 
			}else{
				if(empty($old_meta)){
					delete_post_meta( $post_id, $value_meta );
				}
				else {
					delete_post_meta( $post_id, $value_meta );
				}
			}
		 } 
	}	
}
*/

