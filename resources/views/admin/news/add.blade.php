@extends('templates.admin.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thêm tin</h4>
                        @if (Session::has('msg'))
                        <p>{{Session::get('msg')}}</p>
                        @endif
                    </div>
                    <div class="content">
                        <form action="{{ route('admin.news.add') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên tin</label>
                                    <input type="text" name="name" class="form-control border-input" placeholder="Tên tin" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Danh mục tin</label>
                                    <select name="cat" class="form-control border-input">
                                        @foreach ($objCats as $objCat)
                                            <option value="{{$objCat->cid}}">{{$objCat->name }}</option>
                                        @endforeach
                                                                            
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                </div>
                            </div>
                          
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="preview" rows="4" class="form-control border-input" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea name="detail" rows="6" class="form-control border-input" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input name="submit" type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection