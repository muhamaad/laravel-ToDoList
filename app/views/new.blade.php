@extends('layouts.main')

@section('content')

@foreach ($errors->all() as $error )

<p class="error">{{  $error  }}</p>

	
@endforeach
<h1>Create task</h1>
{{Form::open()}}

<input type ="text" name = "name" placeholder="the name of your task"/>
<input type= "submit" value="create"/>

{{Form::close()}}

@stop