@extends('templates.admin.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thêm User</h4>
                        @if (Session::has('msg'))
                        <p>{{Session::get('msg')}}</p>
                        @endif
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger col-md-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="clearfix">

                    </div>
                    <div class="content">
                        <form action="{{ route('admin.user.add') }}" method="post">
                            {{ csrf_field()}}
                            <div class="row">                                  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control border-input" placeholder="" value="">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input" placeholder="" value="">
                                </div>
                            </div>                          
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label>Repass</label>
                                <input type="password" name="repass" class="form-control border-input" placeholder="" value="">
                            </div>
                        </div>                          
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control border-input" placeholder="" value="">
                        </div>
                    </div>  
                </div>
                <div class="text-left">
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