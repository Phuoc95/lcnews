@extends('templates.cnews.master')
@section('content')
	<div class="body">
    <div class="body_resize">
      <div class="left">
        <h1>{{ $objCat->name }}</h1>
        @php
          $objNews = DB::table('news')->where('cid',$objCat->cid)->get();         
        @endphp
        @foreach ($objNews as $items)
        	<div class="item">
            @php
              $arr = [
                'name' => str_slug($items->name),
                'id'   => $items->nid,
              ]
            @endphp
	        	<h2> <a href="{{ route('cnews.news.detail' , $arr) }}">{{ $items->name }}</a></h2>
		        <img src="{{ getenv('URL_TEMPLATE_CNEWS') }}/images/img_1.jpg" alt="" width="585" height="156" />
		        <div class="clr"></div>
		        <p>{{  $items->preview_text }}</p>
			</div>
        @endforeach
        
      </div>
@stop
