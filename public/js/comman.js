jQuery(document).ready(function(){
  
    jQuery(document).on('click','#create',function(){
        jQuery.ajax({
               type:"POST",
               url:'add/',
               success:function(data){
                   $( "#create" ).before(data);
               }
        });
    });
});