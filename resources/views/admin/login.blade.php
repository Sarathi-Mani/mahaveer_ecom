<!DOCTYPE html>
<html>
 <head>
        <title>MCW Admin</title>
        <link rel="stylesheet" href="{{asset('backend/assets/css/my.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    </head>
<body>
        <div class="container h-100 pt-4">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                   {{ session('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
	 @endif					
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
               
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="{{asset('backend/assets/images/logo.jpg')}}" class="brand_logo" alt="Logo" >
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center form_container">
                        
                        <form method="POST" action="{{ route('admin.login.submit') }}" autocomplete="off">
                            @csrf
                            <div class="input-group ml-5 mb-4">
                           
                                <h3 style="color:white">Admin Page</h3>
                            </div>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control input_user" placeholder="Username">
                            </div>
                            <div id="error1" style="color:red" class="mb-3"></div>

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Password">
                            </div>
                            <div id="error2" style="color:red" class="mb-3"></div>

                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" onclick="return required()" name="button" class="btn login_btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('backend/assets/js/myscripts.js')}}"></script>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </body>
</html>
