jQuery(document).ready(function(){
  
    jQuery(document).on('click','#create',function(){
        jQuery.ajax({
               type:"POST",
               url:'add/',
               success:function(data){
                   $( "#create" ).after(data);
               }
        });
    });
    
    jQuery(document).on('click','.delete-sticky', function(){
        alert('assdasd');
    });
    
});