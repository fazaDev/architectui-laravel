@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Edit User
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a class="btn-shadow mr-3 btn btn-dark" href="{{ route('users.index') }}"><i class="pe-7s-back"></i> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Edit User</div>
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Name</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Email</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Password</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            <div class="text-danger">
                                Leave blank if password don't change.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Password Confirmation</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Role</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block text-left card-footer">
                {{-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> --}}
                <button type="submit" class="btn-wide btn btn-primary"><i class="pe-7s-paper-plane"></i> Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
