@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')
<h2>{{trans('pages.helloworld')}}</h1>
<p>{{trans('pages.description')}}</p>

@if (Sentry::check() )
<p><strong>{{trans('pages.sessiondata')}}:</strong></p>
<pre>{{ var_dump(Session::all()) }}</pre>
@endif 
 
 
@stop