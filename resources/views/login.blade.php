<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Вхід</div>
            <div class="panel-body">
                <form action="{{url('login')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{old('email')}}" required>
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: darkred">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Пароль" name="password" type="password" value="" required>
                            @if ($errors->has('password'))
                                <span class="help-block" style="color: darkred">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <input name="remember" type="hidden" value="false">
                        <div class="checkbox">
                            <label>

                                <input name="remember" type="checkbox" value="true" {{--{{old('remember') ? "checked" : "" }}--}}>Запам'ятати мене
                            </label>
                        </div>
                        <input class="btn btn-primary " type="submit" value="Вхід">
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
</body>

</html>