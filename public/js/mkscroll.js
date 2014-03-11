(function ( $ ) {
 
    $.fn.mkscroll = function( options ) {
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            limit: "3",
            total: "100",
            url:"sticky/scroll"
        }, options );
 
       this.scroll(function(event) {
       
        if (jQuery(window).data('ajaxready') == false) return;
        if (jQuery(window).scrollTop() >= (jQuery(document).height() - jQuery(window).height())) {
            var total = jQuery('#total-item').val();
                jQuery('#sticky_loader').show();
                jQuery.data('ajaxready', false);
                 jQuery.ajax({
                    type: "POST",
                    url: settings.url,
                    data: "limit=" + settings.limit,
                    success: function(data) {
                      if (data)
                        {
                            
                            jQuery("#sticky_loader").before(data);
                            settings.limit = settings.limit + 3;
                            jQuery('#sticky_loader').hide();
                            jQuery(window).data('ajaxready', true);
                        }  
                    }
                 });    
           
        }
    });
 
    };
 
}( jQuery ));