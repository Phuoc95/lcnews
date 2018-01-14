@extends('templates.cnews.master')
@section('content')
<div class="body">
	<div class="body_resize">
		<div class="left">	
			@foreach ($objNews as $item)
				@php
					$arr = [
						'id'=>$item->cid,
						'name'=>str_slug($item->name),
					];
				@endphp
			<div class="item">
				<h2><a href="{{ route('cnews.news.detail',$arr) }}" title="">{{$item->name}}</a></h2>
				<img src="{{ getenv('URL_TEMPLATE_CNEWS') }}/images/img_1.jpg" alt="" width="585" height="156" />
				<div class="clr"></div>
				<p>{{$item->preview_text}}</p>
			</div>
			@endforeach
			{{$objNews->links()}}
		</div>
@endsection
<style>
ul.pagination {
	list-style:  none;
}

li {
	display:  inline-block;
	padding: 20px;
}
</style>
