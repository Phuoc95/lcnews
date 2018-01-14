@extends('templates.admin.master')
@section('content')
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm thông tin</h4>
                                @if (Session::has('msg'))
                                  <p>{{Session::get('msg')}}</p>
                                @endif
                            </div>
                            <div class="content">
                                <form action="{{ route('admin.cat.add') }}" method="post">
                                    {{ csrf_field()}}
                                    <div class="row">                                  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
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