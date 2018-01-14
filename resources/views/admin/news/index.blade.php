@extends('templates.admin.master')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Danh sách tin tức</h4>
						@if (Session::has('msg'))
						<p class="category success">{{ Session::get('msg') }}</p>
						@endif
						
						<a href="{{route('admin.news.add')}}" class="addtop"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/add.png" alt="" /> Thêm</a>
					</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-striped">
							<thead>
								<th>ID</th>
								<th>Tên tin</th>
								<th>Mô tả</th>
								<th>Hình ảnh</th>
								<th>Chức năng</th>
							</thead>
							<tbody>
								@foreach ($objNewes as $items)
								@php
								$urlEdit =route('admin.news.edit',$items->nid);
								$urlDel = route('admin.news.del',$items->nid);
								$picName = $items->picture;
								$urlHinh = '/storage/app/public/files/'.$picName ;
								@endphp
								<tr>
									<td>{{ $items->nid }}</td>
									<td><a href="">{{ $items->name }}</a></td>
									<td><a href="">{{ $items->preview_text }}</a></td>
									<td>
										@if ($urlHinh == ''){
												{{ 'Chưa có hình '}};
										@else
											<img src="{{$urlHinh}}" alt="" style="width: 100px">			
										@endif
									</td>
									<td>
										<a href="{{ $urlEdit }}"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
										<a href="{{$urlDel}}"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/del.gif" alt="" /> Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $objNewes->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection