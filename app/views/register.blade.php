@extends('layouts.main')

@section('content')
<h1>Register</h>


{{Form::open(array('autocomplete'=>'off'))}}
<input type ="text" name = "username" placeholder = "Username"/>
<input type= "password" name="password" placeholder = "Password"/>
<input type ="email" name = "email" placeholder = "email"/><br />
<input type = "submit" value = "register"/>
<input type = "button" value = "cancel" onClick="Cancel()"/>
{{Form::close()}}

<script type="text/javascript">
function Cancel(){
	window.location="{{URL::route('login')}}";
}
</script>



@stop