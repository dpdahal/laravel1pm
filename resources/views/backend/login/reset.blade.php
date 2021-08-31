<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link href="{{url('backend-ui/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('backend-ui/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.message')
            <h1>Change Password</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">Password:
                        <a style="color: red;">{{$errors->first('password')}}</a>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:
                        <a style="color: red;">{{$errors->first('password_confirmation')}}</a>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
