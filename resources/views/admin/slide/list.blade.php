@extends('admin.layout.index')
@section('content')
    <div class="heading">
        <h3 class="page-title">List Slide - <a href="add" class="">Add new</a></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BASIC TABLE -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">List Slide</h3>
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
                                <th>Image</th>
                                <th>Content</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slide as $key => $item)
                            <tr>
                                <td style="width: 5%">{{++$key}}</td>
                                <td>{{$item->name ?? '--unset--'}}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{asset('upload/slide')}}/{{$item->image}}" alt="" style="width: 100px; object-fit: cover;">
                                    @else
                                        <img src="{{asset('upload/slide/image.png')}}" alt="" style="width: 100px; object-fit: cover;">
                                    @endif
                                    
                                </td>
                                <td>{{$item->content ?? '--unset--'}}</td>
                                <td>{{$item->link ?? '--unset--'}}</td>
                                <td style="width: 15%">
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