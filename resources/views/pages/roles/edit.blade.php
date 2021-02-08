@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Edit Role
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <a class="btn-shadow mr-3 btn btn-dark" href="{{ route('roles.index') }}"><i class="pe-7s-back"></i> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
        <div class="card-header">{{ $role->name }}</div>
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="card-body">
                <div class="row">
                    @foreach($permission as $perm)
                        @php
                            $perm_found = null;

                            if(isset($role)) {
                                $perm_found = $role->hasPermissionTo($perm->name);
                            }

                            if(isset($user)) {
                                $perm_found = $user->hasDirectPermission($perm->name);
                            }
                        @endphp

                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                {!! Form::checkbox("permissions[]", $perm->name, $perm_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                @can('role-edit')
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
