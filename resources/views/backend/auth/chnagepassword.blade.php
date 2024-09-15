<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            border: none;
            outline: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(234, 219, 219);
         }
        /* .container{
            filter: blur(10px);
        } */
        form{
            width: 350px;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 10px;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0,0.3);
            backdrop-filter: blur(10px);
        }
        input{
            width: 100%;
            border: 1px solid black;
            padding: 0.6rem 0.8rem;
            margin: 1rem 0;
            background:transparent;
            border-radius: 5px;
        }
        button{
        width: 100%;
        color: white;
        background: blue;
        border-radius: 5px;
        padding: 0.6rem 0.8rem;
        }
    </style>
</head>
<body>
    <form action="{{ route('changepassword') }}" method="POST" id="login-form" autocomplete="off">
        @csrf
            {{-- <label class="form-label">Old Password</label> --}}
            <input class="form-control" placeholder="Enter old password" type="password"
                name="current_password" id="current_password">
            {{-- <label class="form-label">New Password</label> --}}
            <input class="form-control" placeholder="Enter new password" type="password" name="password"
                id="password">
            {{-- <label class="form-label">Confirm Password</label> --}}
            <input class="form-control" placeholder="Enter confirm password" type="password"
                name="confirm_password" id="confirm_password">
            <button type="submit" class="btn btn-primary btn-block w-100">Reset Password</button>
</form>
</body>
</html>







