@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Role Management
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            @can('role-create')
            <a class="btn-shadow mr-3 btn btn-dark" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create new role</a>
            @endcan
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Role
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $item)


                    <tr>
                        <td class="text-center text-muted">{{ ++$i }}</td>
                        <td>{{ $item->name }}</td>

                        <td class="text-center">
                            <a href="{{ route('roles.show', $item->id) }}" class="mr-1 btn-icon btn-icon-only btn btn-outline-primary"><i class="pe-7s-look btn-icon-wrapper"> </i></a>
                            @can('role-edit')
                            <a href="{{ route('roles.edit', $item->id) }}" class="mr-1 btn-icon btn-icon-only btn btn-outline-info"><i class="pe-7s-note btn-icon-wrapper"> </i></a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $item->id],'style'=>'display:inline']) !!}
                            {!! Form::button('<i class="pe-7s-trash btn-icon-wrapper"> </i>', ['type' => 'submit','class' => 'mr-1 btn-icon btn-icon-only btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                            {{-- <button class="mr-1 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> --}}
                            {{-- <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                {{ $roles->links() }}
                {{-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                <button class="btn-wide btn btn-success">Save</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection
