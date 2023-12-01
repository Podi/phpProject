<?php
$license = new RM_Licensing();
$path       =  plugin_dir_url( __FILE__ );
$identifier = 'SETTINGS';


$rm_premium_license_key = get_option( 'rm_premium_license_key','' );
    $rm_premium_license_status = get_option( 'rm_premium_license_status', '' );
    $rm_premium_license_response = get_option( 'rm_premium_license_response', '' );
    $is_any_ext_activated = $license->rm_get_activate_extensions();
    
  //print_r($is_any_ext_activated);

?>




    <form name="rm_license_settings" class="rm-setting-table-main" id="rm_license_settings" method="post">
    <!-----Dialogue Box Starts----->

      <h2 class="rm-setting-tab-content">
        <?php esc_html_e( 'License Settings', 'custom-registration-form-builder-with-submission-manager' ); ?>
      </h2>
    
      <p><strong>Read about activating licenses <a target="_blank" href="https://registrationmagic.com/how-to-activate-registrationmagic-license">here</a></strong></p>

      <div class="wrap">
      <div class="tablenav top">
          <div class="alignleft actions rm-ml-2">
				
		
         
              <a href="admin.php?page=rm_options_manage" class="page-title-action"> <?php esc_html_e( 'Back', 'custom-registration-form-builder-with-submission-manager' ); ?></a>
             	</div>
      </div>
          </div>  
            <table class="form-table">
                <tbody>
                    <tr>
                        <td class="rm-form-table-wrapper" colspan="2">
                            <table class="rm-form-table-setting rm-setting-table widefat">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e( 'Name', 'custom-registration-form-builder-with-submission-manager' );?></th>
                                        <th><?php esc_html_e( 'License Key', 'custom-registration-form-builder-with-submission-manager' );?></th>
                                        <th><?php esc_html_e( 'Validity', 'custom-registration-form-builder-with-submission-manager' );?></th>
                                        <th><?php esc_html_e( 'Action', 'custom-registration-form-builder-with-submission-manager' );?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    <?php if( isset( $is_any_ext_activated ) && !empty($is_any_ext_activated ) ) {
                                        foreach($is_any_ext_activated as $key=>$product):
                                        if(empty($product) || $product[0]=='')
                                        {
                                            continue;
                                        }
                                        //echo $key;die;
                                          $id = $key.'_license_key';
                                          $response = $key.'_license_response';
                                          $status = $key.'_license_status';
                                          $rm_license_key = get_option($id,'' );
                                          $rm_license_response = get_option($response,'' );
                                          $rm_license_status = get_option($status,'' );
                                          $deactivate_license_btn = $key.'_license_deactivate';
                                          $activate_license_btn = $key.'_license_activate';
                                          $bundle_id = get_option($key.'_license_id',$product[0] );
                                          
                                        ?>
                                    
                                            <tr valign="top" class="<?php esc_attr_e($key);?>">
                                            <td>
                                            <div class="rm-purchase-selector">
                                            <select onchange="rm_on_change_bundle(this.value)">
                                                <option> <?php esc_html_e( 'Select Bundle', 'custom-registration-form-builder-with-submission-manager' );?></option>
                                                <option value="55382" <?php selected('55382',$bundle_id); ?>><?php esc_html_e('RegistrationMagic Premium','custom-registration-form-builder-with-submission-manager');?></option>
                                                <option value="55393" <?php selected('55393',$bundle_id); ?>><?php esc_html_e('RegistrationMagic Premium +','custom-registration-form-builder-with-submission-manager');?></option>
                                                <option value="55406" <?php selected('55406',$bundle_id); ?>><?php esc_html_e('MetaBundle','custom-registration-form-builder-with-submission-manager');?></option>
                                                <option value="55407" <?php selected('55407',$bundle_id); ?>><?php esc_html_e('MetaBundle+','custom-registration-form-builder-with-submission-manager');?></option>
                                                <option value="55414" <?php selected('55414',$bundle_id); ?>><?php esc_html_e('Premium Subscription','custom-registration-form-builder-with-submission-manager');?></option>
                                                <option value="55394" <?php selected('55394',$bundle_id); ?>><?php esc_html_e('Premium Subscription 1 Year','custom-registration-form-builder-with-submission-manager');?></option>
                                           
                                            </select>

                                                <span class="rm-tooltips" tooltip="<?php esc_html_e( 'If you have purchased a Bundle, please select the name of the Bundle and enter its license key in the corresponding input box', 'custom-registration-form-builder-with-submission-manager' );?>" tooltip-position="top"></span>
                                            </div>
                                            </td>
                    <td><input id="<?php esc_attr_e($id);?>" name="<?php esc_attr_e($id);?>" type="text" class="regular-text rm_box-wrap rm-license-block" data-prefix="<?php esc_attr_e($bundle_id);?>" data-key="<?php esc_attr_e($key);?>" value="<?php esc_attr_e($rm_license_key); ?>" placeholder="<?php esc_html_e( 'Please Enter License Key', 'custom-registration-form-builder-with-submission-manager' );?>" /></td>
                    <td>         
                        <span class="license-expire-date" style="padding-bottom:2rem;" >
                            <?php
                            if ( ! empty( $rm_license_response->expires ) && ! empty( $rm_license_status ) && $rm_license_status == 'valid' ) {
                                if( $rm_license_response->expires == 'lifetime' ){
                                    esc_html_e( 'Your License key is activated for lifetime', 'custom-registration-form-builder-with-submission-manager' );
                                }else{
                                    echo sprintf( __('Your License Key expires on %s', 'custom-registration-form-builder-with-submission-manager' ), date( 'F d, Y', strtotime( $rm_license_response->expires ) ) );
                                }
                            } else {
                                $expire_date = '';
                            }
                            ?>
                        </span>
                    </td>
                    <td>
                        <span class="<?php esc_attr_e($key);?>-license-status-block">
                            <?php if ( isset( $rm_license_key ) && ! empty( $rm_license_key )) { ?>
                                <?php if ( isset( $rm_license_status ) && $rm_license_status !== false && $rm_license_status == 'valid' ) { ?>
                                    <button type="button" class="button action rm_my-2 rm_license_deactivate" name="<?php esc_attr_e($deactivate_license_btn);?>" id="<?php esc_attr_e($deactivate_license_btn);?>" data-prefix="<?php esc_attr_e($bundle_id); ?>" data-key="<?php esc_attr_e($key);?>" value="<?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Deactivate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                                <?php } elseif( ! empty( $rm_license_status ) && $rm_license_status == 'invalid' ) { ?>
                                    <button type="button" class="button action rm_my-2 rm_license_activate" name="<?php esc_attr_e($activate_license_btn);?>" id="<?php esc_attr_e($activate_license_btn);?>" data-prefix="<?php esc_attr_e($bundle_id); ?>" data-key="<?php esc_attr_e($key);?>" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                                <?php }else{ ?>
                                    <button type="button" class="button action rm_my-2 rm_license_activate" name="<?php esc_attr_e($activate_license_btn);?>" id="<?php esc_attr_e($activate_license_btn);?>" data-prefix="<?php esc_attr_e($bundle_id); ?>" data-key="<?php esc_attr_e($key);?>" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>" style="<?php if ( empty( $rm_license_key ) ){ echo 'display:none'; } ?>"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                                <?php } }else{ ?>
                                    <button type="button" class="button action rm_my-2 rm_license_activate" name="<?php esc_attr_e($activate_license_btn);?>" id="<?php esc_attr_e($activate_license_btn);?>" data-prefix="<?php esc_attr_e($bundle_id); ?>" data-key="<?php esc_attr_e($key);?>" value="<?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?>" style="display:none;"><?php esc_html_e( 'Activate License', 'custom-registration-form-builder-with-submission-manager' );?></button>
                                <?php } ?>
                        </span>
                    </td>
                </tr>
         
                                    
                                    <?php endforeach; } ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        
        
  </form>


        <div class="rm-status-update-model rm-status-success-model" id="rm-extension-license-status">
            <div class="rm-notification-overlay"></div>
            <div class="rm-modal-wrap-toast">
                <div class="rm-modal-container rm-dbfl">
                    <div class="rm-status-close" onclick="rm_close_toast()">×</div>
                    <div class="rm-pdbfl rm-status-box-row rm-status-update-body" id="rm-extension-license-message">
                   
                    </div>
                </div>
            </div>
        </div>

  