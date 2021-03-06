<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: -apple-system, BlinkMacSystemFont, “Segoe UI”, “Roboto”, “Oxygen”, “Ubuntu”, “Cantarell”, “Fira Sans”, “Droid Sans”, “Helvetica Neue”, sans-serif;
        }

        .password-form {
            max-width: 450px;
            width: 95%;
        }

        .form-group {
            width: 100%;
            padding: 10px 0;
        }

        .form-group label {
            text-transform: uppercase;
            font-size: 80%;
            color: indianred;
            padding-bottom: 5px;
            display: inline-block;
        }

        .control {
            width: 100%;
            height: 32px;
            padding-left: 8px;
            line-height: 32px;
            font-size: 1em;
        }

    </style>
</head>
<body>
<form class="password-form" role="form" method="POST" action="{{ url('/admin/password/reset') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Email:</label>
        <input id="email" type="email" class="control" name="email" value="{{ $email or old('email') }}" required
               autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="control" name="password_confirmation" required>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="submit-button control">
            Reset Password
        </button>
    </div>
</form>
</body>
</html>