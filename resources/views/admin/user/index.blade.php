@extends('templates.admin.master')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Danh sách user</h4>
						@if (Session::has('msg'))
						<p class="category success">{{ Session::get('msg') }}</p>
						@endif
						
						<a href="{{route('admin.user.add')}}" class="addtop"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/add.png" alt="" /> Thêm</a>
					</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-striped">
							<thead>
								<th>ID</th>
								<th>Tên</th>
								<th>Họ tên</th>
								<th>Chức nang</th>
							</thead>
							<tbody>
								@foreach ($objmUser as $items)
								@php
								$urlEdit =route('admin.user.edit',$items->id);
								$urlDel = route('admin.user.del',$items->id);
								@endphp
								<tr>
									<td>{{ $items->id }}</td>
									<td><a href="">{{ $items->username }}</a></td>
									<td><a href="">{{ $items->fullname }}</a></td>
									<td>
										<a href="{{ $urlEdit }}"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
										<a href="{{$urlDel}}"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/del.gif" alt="" /> Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection