var limit = 8;
jQuery(document).ready(function() {

    jQuery(document).on('click', '#create', function() {
        jQuery.ajax({
            type: "POST",
            url: 'add',
            success: function(data) {
                $("#create_sticky").after(data);
            }
        });
    });

    jQuery(document).on('click', '.delete-sticky', function() {
        var id = jQuery(this).attr('sticky');
        jQuery.ajax({
            type: 'POST',
            url: 'sticky/remove',
            data: 'id=' + id,
            success: function(data) {
                jQuery('#sticky_' + data).fadeOut(300);
            }
        });
    });

    jQuery(document).on('keyup', '.textarea_design', function() {
        var id = jQuery(this).attr('sticky');
        var data = jQuery(this).val();

        jQuery.ajax({
            type: "POST",
            url: 'sticky/update',
            data: 'id=' + id + '&data=' + data,
            success: function(data) {
            }
        });

    });

    jQuery(window).scroll(function(event) {
         if (jQuery(window).data('ajaxready') == false) return;
        if (jQuery(window).scrollTop() >= (jQuery(document).height() - jQuery(window).height())) {
            var total = 18;
            if (limit < total) {
                jQuery('#sticky_loader').show();
                jQuery(window).data('ajaxready', false);
                 jQuery.ajax({
                    type: "POST",
                    url: "sticky/scroll",
                    data: "limit=" + limit,
                    success: function(data) {
                      if (data)
                        {
                            
                            jQuery("#sticky_loader").before(data);
                            limit = limit + 3;
                            jQuery('#sticky_loader').hide();
                            jQuery(window).data('ajaxready', true);
                        }  
                    }
                 });    
            }
        }
    });
});
