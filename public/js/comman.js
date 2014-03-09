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
    
});