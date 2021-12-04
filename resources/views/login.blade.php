<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="{{asset('registerassets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('registerassets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('registerassets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('registerassets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('registerassets/css/main.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Login Form</h2>
                    <h3 class="title"><x-alert></x-alert></h3>
                    <form method="post" action="{{route('loginIn')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="row row-space">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="label"> name</label>
                                    <input class="input--style-4" type="text" name="name">
                                </div>
                            </div> --}}
                            {{-- <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4 @error('email') @enderror" type="text" name="email" placeholder="email">
                                </div>
                                @error('email')
                                    <div  class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">password</label>
                                    <input class="input--style-4 @error('password')@enderror" type="text" name="password" placeholder="password">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            </div>
                        </div>
                        {{-- <div class="input-group">
                            <label class="label">Profile Image</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input class="input--style-4" type="file" name="image">
                                {{-- <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> --}}
                        <div class="p-t-15">
                            <input type="submit" class="btn btn--radius-2 btn--blue" value="submit" name="login">
                            {{-- <button class="btn btn--radius-2 btn--blue" type="submit" name="register">Submit</button> --}}
                        </div>
                    </form>
                    <br>

                    <a href="{{route('create')}}">
                        <p>Dont have an account ?
                </p>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('registerassets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('registerassets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('registerassets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('registerassets/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('registerassets/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
