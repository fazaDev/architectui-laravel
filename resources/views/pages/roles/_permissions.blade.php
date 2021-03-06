<div class="main-card mb-3 card">
    <div class="card-header">{{ $role->name }}</div>
    <div class="card-body">
        <div class="row">
            @foreach($permissions as $perm)
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
    @if(isset($showButton) ? $showButton : false)
    <div class="card-footer">
        @can('role-edit')
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        @endcan
    </div>
    @endif
</div>
