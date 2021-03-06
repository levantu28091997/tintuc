@extends('admin.layout.index')
@section('content')
    <div class="heading">
        <h3 class="page-title">Type of News - <a href="add" class="">Add new</a></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BASIC TABLE -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">List Type Of News</h3>
                </div>
                <div class="panel-body">
                    @if (session('notifi'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('notifi')}}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaitin as $key => $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->theloai->name}}</td>
                                <td style="width: 20%">
                                    <a href="edit/{{$item->id}}" class="btn btn-primary"><i class="lnr lnr-pencil"></i></a>
                                    <a href="del/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="lnr lnr-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END BASIC TABLE -->
        </div>
    </div>
@endsection