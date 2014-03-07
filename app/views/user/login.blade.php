{{ Form::open(array('url'=>'login', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Login</h2>
 
    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
 
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-success btn-block'))}}
{{ Form::close() }}