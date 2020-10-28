@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Type Of News</h3>
            </div>
            
            <form action="{{route('tintucpostAdd')}}" method="POST">
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
                        <span>Categories</span>
                    </label>
                    <select class="form-control" name="id_theloai" id="id_theloai">
                        @foreach ($theloai as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Type of new</span>
                    </label>
                    <select class="form-control" name="id_loaitin" id="id_loaitin">
                        @foreach ($loaitin as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Title</span>
                    </label>
                    <input type="text" name="title" class="form-control" placeholder="Enter your title">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Description</span>
                    </label>
                    <textarea class="form-control" placeholder="Enter description" rows="4" name="description"></textarea>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Content</span>
                    </label>
                    <textarea class="form-control" placeholder="Enter content" rows="10" name="content"></textarea>
                    <br>
                    <label class="fancy-checkbox">
                        <span>Image</span>
                    </label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <label class="fancy-checkbox">
                        <input type="checkbox" value="1" name="features">
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
                    // alert($data);
                    $('#id_loaitin').html($data);
                });
            });
        });
    </script>
@endsection