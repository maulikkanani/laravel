<div class="row">
    <div id="create_sticky" class="col-sm-4 col-lg-4 stick_note_add">
        <center> <div id="create" class="span4">+</div> </center> 
    </div>
  @foreach($results as $key => $value)
   <div id="sticky_{{ $value->id }}" class="col-sm-4 col-lg-4 stick_note">
        <textarea  sticky="{{ $value->id }}" class="form-control textarea_design" rows="3">{{ $value->sitck_data }}</textarea>
        <span  id="remove-{{ $value->id }}" sticky="{{ $value->id }}"  class="glyphicon glyphicon-remove-circle delete-sticky red"></span>
   </div>
    
@endforeach

</div>

