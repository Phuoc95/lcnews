@extends('templates.admin.master')
@section('content')
    <div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="header">
	                        <h4 class="title">Danh sách danh mục tin</h4>
	                        @if (Session::has('msg'))
	                        	<p class="category success">{{ Session::get('msg') }}</p>
	                        @endif
	                      
	                        <a href="{{ route('admin.cat.add') }}" class="addtop"><img src="{{ getenv('URL_TEMPLATE_ADMIN') }}/img/add.png" alt="" /> Thêm</a>
	                    </div>
	                    <div class="content table-responsive table-full-width">
	                        <table class="table table-striped">
	                            <thead>
	                                <th>ID</th>
	                            	<th>Tên</th>
	                            	<th>Chức năng</th>
	                            </thead>
	                            <tbody>
	                            	@foreach ($objCats as $items)
	                            		@php
	                            		$urlEdit = route('admin.cat.edit',[$items->cid]);
	                            		$urlDel = route('admin.cat.del',[$items->cid]);
	                            		@endphp
                            		<tr>
	                                	<td>{{ $items->cid }}</td>
	                                	<td><a href="">{{ $items->name }}</a></td>
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