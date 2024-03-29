@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header">Category Manager</h1>
            </div>
            <!--End Page Header -->
        </div>
        @if(Session::has('success'))
            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i>
                        <b>{{Session::get('success')}}</b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <a href="{{url('admin/category/create')}}" class="btn btn-success">Create new</a>
            </div>
            {!! Form::open(['method'=>'GET','url'=>'admin/category']) !!}
            <div class="form-group input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search category..."
                       value="{{$keyword}}"/>
                <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
            </div>
            {!! Form::close() !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Simple Table Example
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($list)
                                        @foreach($list as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url'=>['admin/category',$item->id]
                                                    ]) !!}
                                                    <a href="{{url('admin/category/'.$item->id.'/edit')}}"
                                                       class="btn btn-primary">Edit</a>
                                                    <button type="submit" onclick="return confirm('Are you sure?'); "
                                                            class="btn btn-success red">
                                                        Delete
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!--End simple table example -->

        </div>
    </div>
    </div>
    <!-- end page-wrapper -->
@endsection
