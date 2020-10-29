@extends('admin.layout.index')
@section('content')
    <div class="heading">
        <h3 class="page-title">News - <a href="add" class="">Add new</a></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BASIC TABLE -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">List News</h3>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Features</th>
                                <th>Views</th>
                                <th>Categories</th>
                                <th>Type of New</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tintuc as $key => $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{asset('upload/tintuc')}}/{{$item->image}}" alt="" style="width: 100px; object-fit: cover;">
                                    @else
                                        <img src="{{asset('upload/tintuc/image.png')}}" alt="" style="width: 100px; object-fit: cover;">
                                    @endif
                                    
                                </td>
                                <td class="text-danger" style="text-align: center">@if ($item->features == 1)<span class="lnr lnr-star"></span>@endif</td>
                                <td>{{$item->views}} <span class="lnr lnr-eye"></span></td>
                                <td>{{$item->loaitin->name ?? '-- unset--'}}</td>
                                <td>{{$item->loaitin->theloai->name ?? '-- unset--'}}</td>
                                <td style="text-align: center">
                                    <a href="{{route('commentList', $item->id)}}">{{count($item->comment)}} comment</a>
                                </td>
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