@extends('layouts.main')

@section('content')
<h1>Your Items <small>(<a href="{{URL::route('new')}}" >New task</a>)</small>


</h1>

{{Form::open(array('id'=>'EditForm'))}}
<input type="hidden" id="id" name="id" value=""/>
@foreach($items as $item)
<input type="checkbox" {{$item->done?'checked':''}}/>
<input type="text" name="item_name{{$item->id}}" value="{{($item->name)}}"/>
<input type="button" onClick="Submit_Edit({{$item->id}})" value="Edit"/>
<small>(<a href="{{URL::route('delete',$item->id)}}">delete</a>)</small><br />

@endforeach
{{Form::close()}}

<small><a href="{{URL::route('register')}}">register</a></small><br />
<small><a href="{{URL::route('logout')}}">logout</a></small><br />

<script type="text/javascript">
	function Submit_Edit(item){
		document.getElementById('id').value = item;
		console.log(item);
		document.getElementById('EditForm').submit();
	}
</script>

@stop