@extends('layouts.main')

@section('content')
<h1>Your Items <small>(<a href="{{URL::route('new')}}" >New task</a>)</small>


</h1>


@foreach($items as $item)

{{Form::open(array('style'=>'background: '.(($item->done) ? '#eee' : 'none'),'id'=>$item->id.'-EditForm'))}}
<!-- <input type="checkbox" {{$item->done?'checked':''}}/> -->
<input type="hidden" name="id" value="{{$item->id}}"/>
<!-- <input type="hidden" name="done" value="{{$item->done}}"/> -->
<span id="text-{{$item->id}}">{{($item->name)}}</span>
<input type="text" id="input-{{$item->id}}" style="display: none" name="item_name{{$item->id}}" value="{{($item->name)}}"/>
<input type="button" style="display: {{(($item->done) ? 'none' : 'inline')}}" id="button-{{$item->id}}" onClick="Submit_Edit({{$item->id}})" value="Edit"/>
<input type="button" style="display: {{(($item->done) ? 'none' : 'inline')}}" id="done-{{$item->id}}" onClick="Submit_done({{$item->id}})" value="Done!"/>
<small>(<a href="{{URL::route('delete',$item->id)}}">delete</a>)</small><br />

{{Form::close()}}
@endforeach

<!-- <small><a href="{{URL::route('register')}}">register</a></small><br /> -->
<small><a href="{{URL::route('logout')}}">logout</a></small><br />

<script type="text/javascript">
	function Submit_Edit(item){
		var flag = document.getElementById('button-'+item).value;
		if (flag == 'Edit'){
		document.getElementById('text-'+item).style.display = 'none';
		document.getElementById('input-'+item).style.display = 'inline';
		document.getElementById('button-'+item).value = 'Submit';
		}
		else if (flag == 'Submit'){
		console.log(item);
		document.getElementById(item+'-EditForm').submit();
	}
	}

	function Submit_done(item){
		$.ajax({
		  type: "GET",
		  url: "/public/index.php/done/"+item,
		  beforeSend: function( xhr ) {
		    if(!window.confirm('are you sure you did this task'))
		    	xhr.abort();
		  }
		})
		  .done(function( data ) {
		    $('body').html(data);
		  });
	}
	
</script>

@stop