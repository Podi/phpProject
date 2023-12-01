<?php
/**
 * Class for license
 */

defined( 'ABSPATH' ) || exit;

class RM_Licensing {
    // activate license
    public function rm_activate_license($license,$item_id,$prefix)
    {
        $return = array();
        $error_status = '';
        $rm_store_url = "https://registrationmagic.com/";
        $home_url = home_url();
        // data to send in our API request
           $api_params = array(
               'edd_action' => 'activate_license',
               'license'    => $license,
               'item_id'    => $item_id,
               'url'        => $home_url
           );

           // Call the custom API.
           $response = wp_remote_post( $rm_store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
           
            // make sure the response came back okay
            if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
                $message =  ( is_wp_error( $response ) && ! empty( $response->get_error_message() ) ) ? $response->get_error_message() : __( 'An error occurred, please try again.' );
            } else {
                $license_data = json_decode( wp_remote_retrieve_body( $response ) );
                if(isset($license_data->error)){
                    $error_status = $license_data->error;
                }
                if ( false === $license_data->success ) {
                    if( isset( $license_data->error ) ){
                        switch( $license_data->error ) {
                            case 'expired' :
                                $message = sprintf(
                                    __( 'Your license key expired on %s.', 'custom-registration-form-builder-with-submission-manager' ),
                                    date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
                                );
                                break;
                            case 'revoked' :
                                $message = __( 'Your license key has been disabled.' , 'custom-registration-form-builder-with-submission-manager' );
                                break;
                            case 'missing' :
                                $message = __( 'Your license key is invalid.' , 'custom-registration-form-builder-with-submission-manager' );
                                break;
                            case 'invalid' :
                            case 'site_inactive' :
                                $message = __( 'Your license is not active for this URL.' , 'custom-registration-form-builder-with-submission-manager' );
                                break;
                            case 'item_name_mismatch' :
                                $message = sprintf( __( 'This appears to be an invalid license key for %s.', 'custom-registration-form-builder-with-submission-manager'  ), $item_name );
                                break;
                            case 'no_activations_left':
                                $message = __( 'Your license key has reached its activation limit.', 'custom-registration-form-builder-with-submission-manager'  );
                                break;
                            default :
                                $message = __( 'An error occurred, please try again.', 'custom-registration-form-builder-with-submission-manager'  );
                                break;
                        }
                    }
                }
            }

            // Check if anything passed on a message constituting a failure
            if ( ! empty( $message ) ) {
            }
            
            if( !empty( $license_data ) ){
                // $license_data->license will be either "valid" or "invalid"
                $license_status  = ( isset( $license_data->license ) && ! empty( $license_data->license ) && $license_data->license == 'valid' ) ? $license_data->license : '';
                $license_response  = ( isset( $license_data ) && ! empty( $license_data ) ) ? $license_data : '';
                update_option( $prefix.'_license_status', $license_status );
                update_option( $prefix.'_license_response', $license_response );
                update_option( $prefix.'_item_id', $item_id );
            }
            
            if( isset( $license_data->expires ) && ! empty( $license_data->expires ) ) {
                if( $license_data->expires == 'lifetime' ){
                    $expire_date = __( 'Your license key is activated for lifetime', 'custom-registration-form-builder-with-submission-manager' );
                }else{
                    $expire_date = sprintf( __( 'Your license Key expires on %s.', 'custom-registration-form-builder-with-submission-manager' ), date( 'F d, Y', strtotime($license_data->expires) ) );
                }
            }else{
                $expire_date = '';
            }   
            
            ob_start(); ?>
                <?php if( isset( $license_data->license ) && $license_data->license == 'valid' ){ ?>
                    <button type="button" class="button action rm-my-2 rm_license_deactivate" data-prefix="<?php echo esc_attr( $item_id ); ?>" name="<?php echo esc_attr( $prefix); ?>_license_deactivate" id="<?php echo esc_attr( $prefix ); ?>_license_deactivate" value="<?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php }elseif( isset( $license_data->license ) && $license_data->license == 'invalid' ){ ?>
                    <button type="button" class="button action rm-my-2 rm_license_activate" data-prefix="<?php echo esc_attr( $item_id ); ?>" name="<?php echo esc_attr( $prefix ); ?>_license_activate" id="<?php echo esc_attr( $prefix ); ?>_license_activate" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php }else{ ?>
                    <button type="button" class="button action rm-my-2 rm_license_activate" data-prefix="<?php echo esc_attr($item_id); ?>" name="<?php echo esc_attr( $prefix ); ?>_license_activate" id="<?php echo esc_attr( $prefix ); ?>_license_activate" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php } ?>      
            <?php
            $license_status_block = ob_get_clean();

            if ( empty( $message ) || $license_data->license == 'valid' ) {
                if( isset( $license_data->license ) && $license_data->license == 'valid' ){
                    $message = __( 'Your License key is activated.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'invalid' ){
                    $message = __( 'Your license key is invalid.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'deactivated' ){
                    $message = __( 'Your License key is deactivated.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'failed' ){
                    $message = __( 'Your License key deactivation failed. Please try after some time.', 'custom-registration-form-builder-with-submission-manager'  );
                }
            }

            $return = array( 'license_data' => $license_data, 'license_status_block' => $license_status_block, 'expire_date' => $expire_date, 'message' => $message );
        
            return $return;
           
    }

      // deactivate license
    public function rm_deactivate_license($license,$item_id,$prefix)
    {
        $return = array();
        $error_status = '';
        $rm_store_url = "https://registrationmagic.com/";
        $home_url = home_url();
        // data to send in our API request
           $api_params = array(
               'edd_action' => 'deactivate_license',
               'license'    => $license,
               'item_id'    => $item_id,
               'url'        => $home_url
           );
        
         // Call the custom API.
            $response = wp_remote_post( $rm_store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
            
            // make sure the response came back okay
            if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
                $message =  ( is_wp_error( $response ) && ! empty( $response->get_error_message() ) ) ? $response->get_error_message() : __( 'An error occurred, please try again.' );
            } else {
                $license_data = json_decode( wp_remote_retrieve_body( $response ) );
                if(isset($license_data->error)){
                    $error_status = $license_data->error;
                }
                
                if ( false === $license_data->success ) {
                    if( isset( $license_data->error ) ){
                        switch( $license_data->error ) {
                            case 'expired' :
                                $message = sprintf(
                                    __( 'Your license key expired on %s.' ),
                                    date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
                                );
                                break;
                            case 'revoked' :
                                $message = __( 'Your license key has been disabled.', 'custom-registration-form-builder-with-submission-manager'   );
                                break;
                            case 'missing' :
                                $message = __( 'Your license key is invalid.', 'custom-registration-form-builder-with-submission-manager'   );
                                break;
                            case 'invalid' :
                            case 'site_inactive' :
                                $message = __( 'Your license is not active for this URL.', 'custom-registration-form-builder-with-submission-manager'   );
                                break;
                            case 'item_name_mismatch' :
                                $message = sprintf( __( 'This appears to be an invalid license key for %s.', 'custom-registration-form-builder-with-submission-manager'   ), $item_name );
                                break;
                            case 'no_activations_left':
                                $message = __( 'Your license key has reached its activation limit.', 'custom-registration-form-builder-with-submission-manager'   );
                                break;
                            default :
                                $message = __( 'An error occurred, please try again.', 'custom-registration-form-builder-with-submission-manager'   );
                                break;
                        }
                    }
                }
            }

            // Check if anything passed on a message constituting a failure
            if ( ! empty( $message ) ) {

            }  
            
            if( !empty( $license_data ) ){
                // $license_data->license will be either "valid" or "invalid"
                $license_status  = ( isset( $license_data->license ) && ! empty( $license_data->license ) && $license_data->license == 'valid' ) ? $license_data->license : '';
                $license_response  = ( isset( $license_data ) && ! empty( $license_data ) ) ? $license_data : '';
                update_option( $prefix.'_license_status', $license_status );
                update_option( $prefix.'_license_response', $license_response );
                update_option( $prefix.'_item_id', $item_id );
            }
            
            if( isset( $license_data->expires ) && ! empty( $license_data->expires ) ) {
                if( $license_data->expires == 'lifetime' ){
                    $expire_date = __( 'Your license key is activated for lifetime', 'custom-registration-form-builder-with-submission-manager' );
                }else{
                    $expire_date = sprintf( __( 'Your License Key expires on %s.', 'custom-registration-form-builder-with-submission-manager' ), date('F d, Y', strtotime( $license_data->expires ) ) );
                }
            }else{
                $expire_date = '';
            }           
            
            ob_start(); ?>
                <?php if( isset( $license_data->license ) && $license_data->license == 'valid' ){ ?>
                    <button type="button" class="button action ep-my-2 rm_license_deactivate" data-prefix="<?php echo esc_attr( $item_id ); ?>" name="<?php echo esc_attr( $prefix ); ?>_license_deactivate" id="<?php echo esc_attr( $prefix ); ?>_license_deactivate" value="<?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php }elseif( isset( $license_data->license ) && $license_data->license == 'invalid' ){ ?>
                    <button type="button" class="button action ep-my-2 rm_license_activate" data-prefix="<?php echo esc_attr($item_id ); ?>" name="<?php echo esc_attr( $prefix ); ?>_license_activate" id="<?php echo esc_attr($prefix); ?>_license_activate" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php }elseif( isset( $license_data->license ) && $license_data->license == 'failed' ){ ?>
                    <button type="button" class="button action ep-my-2 rm_license_activate" data-prefix="<?php echo esc_attr( $item_id); ?>" name="<?php echo esc_attr($prefix); ?>_license_activate" id="<?php echo esc_attr( $prefix); ?>_license_activate" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php }else{ ?>
                    <button type="button" class="button action ep-my-2 rm_license_activate" data-prefix="<?php echo esc_attr($item_id); ?>" name="<?php echo esc_attr($prefix); ?>_license_activate" id="<?php echo esc_attr($prefix); ?>_license_activate" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                <?php } ?>    
            <?php
            $license_status_block = ob_get_clean();

            if ( empty( $message ) || $license_data->license == 'valid' ) {
                if( isset( $license_data->license ) && $license_data->license == 'valid' ){
                    $message = __( 'Your License key is activated.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'invalid' ){
                    $message = __( 'Your license key is invalid.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'deactivated' ){
                    $message = __( 'Your License key is deactivated.', 'custom-registration-form-builder-with-submission-manager'  );
                }
                if( isset( $license_data->license ) && $license_data->license == 'failed' ){
                    $message = __( 'Your License key deactivation failed. Please try after some time.', 'custom-registration-form-builder-with-submission-manager'  );
                }
            }

            $return = array( 'license_data' => $license_data, 'license_status_block' => $license_status_block, 'expire_date' => $expire_date, 'message' => $message );
          

            return $return;
          
    }

    public function rm_get_activate_extensions() {
                $ext = array(
                    'rm_premium'=>array(55382,'RegistrationMagic Premium')
                );

		return $ext;
	}
    
}