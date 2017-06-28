@extends('guests.master1')
	
	@section('head')

	<title>Error - Video-HQApps</title>
	
	@endsection
@section('content')
<h1>
	@if(isset($message))
		{{$message}}
	@else
		Error! 404 Not found.
	@endif
</h1>
@endsection
