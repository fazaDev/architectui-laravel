@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Show Role
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
                                {!! Form::checkbox("permissions[]", $perm->name, $perm_found, isset($options) ? $options : ['disabled']) !!} {{ $perm->name }}
                            </label>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Name</label>
                        {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="">Permission</label>
                        <br/>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <div class="mb-2 mr-2 badge badge-success">{{ $v->name }}</div>
                            <br/>
                            @endforeach
                        @endif
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="d-block text-left card-footer">
                {{-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> --}}
                {{-- <button type="submit" class="btn-wide btn btn-primary"><i class="pe-7s-paper-plane"></i> Update</button> --}}
            </div>

        </div>
    </div>
</div>

@endsection
