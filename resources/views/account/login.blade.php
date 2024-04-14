<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aidea Group-Back Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        html, body {
            margin: 0;
            height: 100%;
        }
        body{
            margin:0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle, rgba(250,194,24,1) 51%, rgba(248,111,21,1) 93%);
        }
    </style>
</head>
<body>
	<div class="col-md-8 col-lg-5 col-xl-4">
        <div class="card" style="background: #E7E3DD; border: 1px solid #435861;">
            <div class="card-body text-center">
                <img src="../../images/logo/logo.png" class="img-fluid">
                <form action="{{ route('authenticate') }}" method="post" class="mt-3" >
                    @csrf
                    <div class="mb-3 row">
                        <label for="username" class="col-md-4 col-form-label text-md-end text-start" style="font-weight: bold;">Username: </label>
                        <div class="col-md-6">
                          <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start" style="font-weight: bold;">Password: </label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-3 offset-md-7">
                            <input type="submit" class="btn btn-dark w-100" value="Login">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script
	  src="https://code.jquery.com/jquery-3.7.1.js"
	  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
	  crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        console.log({{ route('authenticate') }});
    })
</script>
</html>