var limit=5;
jQuery(document).ready(function(){
    
    jQuery(document).on('click','#create',function(){
        jQuery.ajax({
               type:"POST",
               url:'add',
               success:function(data){
                   $( "#create_sticky" ).after(data);
               }
        });
    });
    
    jQuery(document).on('click','.delete-sticky', function(){
       var id=jQuery(this).attr('sticky');
        jQuery.ajax({
          type:'POST',
          url:'sticky/remove',
          data:'id='+id,
          success:function(data){
                jQuery('#sticky_'+data).fadeOut(300);
          }
       });
    });
    
    jQuery(document).on('keyup','.textarea_design', function(){
        var id=jQuery(this).attr('sticky');
        var data=jQuery(this).val();
        
        jQuery.ajax({
           type:"POST",
           url:'sticky/update',
           data:'id='+id+'&data='+data,
           success:function(data){
           }
        });
     
    });
    
    jQuery(window).scroll(function(){
	   if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
                    var total=18;
                    fnGetMoreSticky(total);
		}
   });
    
});

function fnGetMoreSticky(total){
		var search_va=jQuery("#search").val();
		if(search_va=="")
		{
			var search_value="";
		}
		else
		{
			var search_value=search_va;
		}

		jQuery.ajax({
			type: "POST",
			url:"sticky/scroll", 
			data:"limit="+limit,
			success: function(data){
				if(data)
				{	
					jQuery(".row").append(data);
					limit=limit+3;
				}
			}
		});
			
	
}