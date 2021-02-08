@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Role and Permission
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            {{-- @can('role-create')
            <a class="btn-shadow mr-3 btn btn-dark" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create new role</a>
            @endcan --}}
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        @foreach($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}
        @if($role->name == 'Super Admin')
            @include('pages.roles._permissions', [
                'title' => $role->name .' Permissions',
                'options' => ['disabled'],
                'showButton' => true
            ])
        @else
            @include('pages.roles._permissions', [
                'title' => $role->name .' Permissions',
                'model' => $role,
                'showButton' => true
            ])
            {{-- @can('role-edit')
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan --}}
        @endif
        {!! Form::close() !!}
        @endforeach
    </div>
</div>

@endsection
