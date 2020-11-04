@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add News</h3>
            </div>
            
            <form action="{{route('tintucpostEdit', $tintuc->id)}}" method="POST" enctype="multipart/form-data">
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
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('error')}}
                        </div>
                    @endif
                    @csrf
                    <label class="fancy-checkbox">
                        <span>Categories</span>
                    </label>
                    <select class="form-control" name="id_theloai" id="id_theloai">
                        @foreach ($theloai as $item)
                            <option value="{{$item->id}}" @if ($tintuc->loaitin->theloai->id == $item->id) {{"selected"}} @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Type of new</span>
                    </label>
                    <select class="form-control" name="id_loaitin" id="id_loaitin">
                        @foreach ($loaitin as $item)
                            <option value="{{$item->id}}" @if ($tintuc->loaitin->id == $item->id) {{"selected"}} @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Title</span>
                    </label>
                    <input type="text" name="title" class="form-control" placeholder="Enter your title" value="{{$tintuc->title}}">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Description</span>
                    </label>
                    <textarea class="form-control" placeholder="Enter description" rows="4" name="description">{{$tintuc->description}}</textarea>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Content</span>
                    </label>
                    <textarea class="form-control ckeditor" id="content-ckeditor" name="content" rows="10">{{$tintuc->content}}</textarea>
                    {{-- <textarea class="form-control" placeholder="Enter content" rows="10" name="content"></textarea> --}}
                    <br>
                    <label class="fancy-checkbox">
                        <span>Image</span>
                    </label>
                    <img src="{{asset('upload/tintuc')}}/{{$tintuc->image}}" alt="" style="width: 100px; object-fit: cover;"><br>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <label class="fancy-checkbox">
                        <input type="checkbox" value="1" name="features" @if ($tintuc->features == 1) {{"checked"}} @endif>
                        <span>Features</span>
                    </label>
                    <br>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#id_theloai').change(function(){
                var id_theloai = $(this).val();
                var url = "{{url('/admin/ajax/loaitin/')}}";
                $.get(url+'/'+id_theloai,function($data){
                    $('#id_loaitin').html($data);
                });
            });
        });
    </script>
@endsection