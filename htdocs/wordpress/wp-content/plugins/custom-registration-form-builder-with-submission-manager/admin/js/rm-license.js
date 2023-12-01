jQuery( function( $ ) {
    $(".rm-license-block").keyup(function(e) {
        let prefix = $(this).data('key');
        let license_key_length = $('#' + prefix + '_license_key' ).val();
        // let child_length = $('.'+ prefix +  ' .' + prefix + '-license-status-block').children.length;
        if( license_key_length.length === 32 && prefix != 'undefined' && prefix != '' ){
            $('#' + prefix + '_license_activate' ).show();
        }
    });

    $(".rm-license-block").keydown(function(e) {
        let prefix = $(this).data('key');
        if( prefix != 'undefined' && prefix != '' ){
            $('#' + prefix + '_license_activate' ).hide();
        }
    });

    $( document ).on( 'click', '.rm_license_activate', function(e) {
        e.preventDefault();
        let prefix = $(this).data('prefix');
        let key = $(this).data('key');
        let license_key = $('#'+key + '_license_key').val();
        let rm_license_activate = $('#' + key + '_license_activate').val();
        // $( '.'+ prefix +  ' .' + prefix + '-license-status-block' ).html( '' );
        $( '.'+ key +  ' .license-expire-date' ).html( '' );
        $( '.'+ key +  ' .' + key + '-license-status-block .rm_license_activate' ).addClass( 'disabled' );
    
        let data = { 
            action: 'rm_activate_license', 
            nonce: rm_admin_license_settings.nonce,
            rm_license_activate : rm_license_activate,
            rm_license : license_key,
            rm_item_id : prefix, 
            rm_item_key: key
        };
        console.log(data);
        $.ajax({
            type: 'POST', 
            url :  rm_admin_license_settings.ajax_url,
            data: data,
            success: function( response ) {
                $( '.'+ key +  ' .' + key + '-license-status-block .rm_license_activate' ).removeClass( 'disabled' );
                if(response.success===true && response.data.license_data.success === true )
                {
                    show_rm_toast( 'success', response.data.message );
                    // update license activate/deactivate button
                    //console.log('.'+ key +  ' .' + key + '-license-status-block');
                    if( response.data.license_status_block != '' && response.data.license_status_block != 'undefined' ){
                        //console.log('.'+ key +  ' .' + key + '-license-status-block');
                        $('.'+ key +  ' .' + key + '-license-status-block').html(response.data.license_status_block);
                    }
                   
                    // update license expiry date
                    $('.' + key +  ' .license-expire-date').html(response.data.expire_date);
                    
                }else{
                    show_rm_toast( 'error', response.data.message );
                }
            
            }
        });
    });

    $( document ).on( 'click', '.rm_license_deactivate', function(e) {
        e.preventDefault();
        let prefix = $(this).data('prefix');
        let key = $(this).data('key');
        let license_key = $('#'+key + '_license_key').val();
        let rm_license_deactivate = $('#'+ key + '_license_deactivate').val();
        
        // $( '.'+ prefix +  ' .' + prefix + '-license-status-block' ).html( '' );
        $( '.'+ key +  ' .license-expire-date' ).html( '' );
        $( '.'+ key +  ' .' + key + '-license-status-block .rm_license_deactivate' ).addClass( 'disabled' );
        let data = { 
            action: 'rm_deactivate_license', 
            nonce: rm_admin_license_settings.nonce,
            rm_license_deactivate : rm_license_deactivate, 
            rm_license : license_key,
            rm_item_id : prefix, 
            rm_item_key: key
        };
        $.ajax({
            type: 'POST', 
            url :  rm_admin_license_settings.ajax_url,
            data: data,
            success: function( response ) {
                $( '.'+ key +  ' .' + key + '-license-status-block .rm_license_deactivate' ).removeClass( 'disabled' );
                if( response.success===true && response.data.license_data.success === true )
                {
                    show_rm_toast( 'success', response.data.message );
                    // update license activate/deactivate button
                    if( response.data.license_status_block != '' && response.data.license_status_block != 'undefined' ){
                        $('.'+ key +  ' .' + key + '-license-status-block').html(response.data.license_status_block);
                    }
                    // update license expiry date
                    // $('.'+prefix+ ' .license-expire-date').html(response.data.expire_date);
                    $('.'+key+ ' .license-expire-date').html('');
                }else{
                    show_rm_toast( 'error', response.data.message );
                    if( response.data.license_status_block != '' && response.data.license_status_block != 'undefined' ){
                        $('.'+ key +  ' .' + key + '-license-status-block').html(response.data.license_status_block);
                    }
                    // if( response.data.expire_date != '' && response.data.expire_date != 'undefined' ){
                    //     // update license expiry date
                    //     $('.'+prefix+ ' .license-expire-date').html(response.data.expire_date);
                    // }
                    $('.'+key+ ' .license-expire-date').html(''); 
                }
            }
        });
    });


});

// show toast message
function show_rm_toast( type, message, heading = true ) {
    jQuery( "#rm-extension-license-status" ).addClass( 'rm-modal-show' );
    jQuery('#rm-extension-license-message').html(message);
      console.log(type);
    if(type === "error"){
        console.log(message);
        jQuery( "#rm-extension-license-status" ).addClass( 'rm-status-failed-model' );
        jQuery( "#rm-extension-license-status" ).removeClass( 'rm-status-succuess-model' )
    }
    
    setTimeout(
    function() 
    {
        rm_close_toast();
      //do something special
    }, 5000);
}

function rm_close_toast()
{
    jQuery( "#rm-extension-license-status" ).removeClass( 'rm-modal-show' );
    jQuery('#rm-extension-license-message').html('');
}


function rm_on_change_bundle(value)
{
    jQuery('#rm_premium_license_key').attr('data-prefix',value);
    jQuery('.rm_premium-license-status-block button').attr('data-prefix',value);
}



  jQuery(document).ready(function(){
    jQuery('.rm-tooltips').append("<span></span>");
    jQuery('.rm-tooltips:not([tooltip-position])').attr('tooltip-position', 'bottom');


    jQuery(".rm-tooltips").mouseenter(function () {
        jQuery(this).find('span').empty().append(jQuery(this).attr('tooltip'));
    });
  });
