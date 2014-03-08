<div class="row">
  @foreach($results as $key => $value)
   <div class="col-sm-4 col-lg-4 stick_note">
        <textarea id="sticky_{{ $value->id }}" sticky="{{ $value->id }}" class="form-control textarea_design" rows="3"></textarea>
        <a id="remove-{{ $value->id }}" class="delete-sticky" href="#">X</a>
   </div>
    
@endforeach

<div id="create">+</div>
    
</div>

