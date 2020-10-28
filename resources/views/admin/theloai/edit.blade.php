@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Categories <span style="color: red; font-weight:bold; ">{{$theloai->name}}</span></h3>
            </div>
            
            <form action="{{route('theloaipostEdit',$theloai->id)}}" method="POST">
                <div class="panel-body">
                    {{-- {{dd($errors)}} --}}
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
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$theloai->name}}">
                    <br>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection