<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        {!! Form::open(['method'=>'POST','action' => ['PermissionController@updateRole', $role->name]]) !!}
        @foreach(config('permissions') as $i => $permission)
            <li>
                <div class="form-check">
                    <label >{!! Form::checkbox("perm[]", $i, $role->hasPermissionTo($i) ? 'true' : ''); !!}{{ $permission }}</label>
                </div>
            </li>
        @endforeach
        {!! Form::submit( 'Save', ['class' => 'btn btn-primary', 'name' => 'submit'])!!}
        {!! Form::close() !!}

</body>
</html>