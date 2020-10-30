@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Slide</h3>
            </div>
            
            <form action="{{route('slidepostEdit', $slide->id)}}" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-times-circle"></i> {{$error}}
                            </div>
                        @endforeach         
                    @endif
                    @if (session('notifi'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('notifi')}}
                        </div>
                    @endif
                    @csrf
                    <label class="fancy-checkbox">
                        <span>Name</span>
                    </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$slide->name}}">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Image</span>
                    </label>
                    <img src="{{asset('upload/slide')}}/{{$slide->image}}" alt="" style="width: 100px; object-fit: cover;">
                    <input type="file" name="image" class="form-control">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Content</span>
                    </label>
                    <textarea class="form-control" placeholder="Enter your content" rows="5" name="content">{{$slide->content}}</textarea>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Link</span>
                    </label>
                    <input type="text" name="link" class="form-control" placeholder="Enter link" value="{{$slide->link}}">
                    <br>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection