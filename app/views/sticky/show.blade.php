<div class="row">
    <div class="col-sm-4 col-lg-4 stick_note_add">
        <div id="create">+</div>  
    </div>
  @foreach($results as $key => $value)
   <div class="col-sm-4 col-lg-4 stick_note">
        <textarea id="sticky_{{ $value->id }}" sticky="{{ $value->id }}" class="form-control textarea_design" rows="3"></textarea>
        <span  id="remove-{{ $value->id }}" sticky="{{ $value->id }}"  class="glyphicon glyphicon-remove-circle delete-sticky"></span>
   </div>
    
@endforeach

</div>

