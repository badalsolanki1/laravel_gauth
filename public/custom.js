$(document).on('click','.btn_hideshow',function(){  
    
    if($('.qr_show:visible').length == 0)
    {
        $('.qr_show').removeClass('d-none');
        $('.btn_hideshow').html('Hide QR Code');
    }        
    else{
        $('.qr_show').addClass('d-none');
        $('.btn_hideshow').html('Show QR Code');
    }

   
});