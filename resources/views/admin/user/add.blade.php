@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Slide</h3>
            </div>
            
            <form action="{{route('userpostAdd')}}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Email</span>
                    </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    <br>
                    <label class="fancy-checkbox">
                        <span>Password</span>
                    </label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                    <br>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection