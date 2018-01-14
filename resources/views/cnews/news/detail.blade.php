@extends('templates.cnews.master')
@section('content')
	<div class="body">
    <div class="body_resize">
      <div class="left">
        <h1>{{ $objNew->name }}</h1>
        <div class="item-detail">
          <p> {!! $objNew->detail_text !!}</p>
    </div>
      </div>
      
@stop