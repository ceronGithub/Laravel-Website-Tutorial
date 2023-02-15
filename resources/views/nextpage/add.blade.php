<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <title>Company Details</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px;">    
        <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
        <h1>Add new Company</h1>
        <div class="btn-group" style="padding-right: 100px">
            <button type="button" class="btn btn-secondary">{{ Auth::user()->name }}</button>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('companyNextPageVer') }}">Back to Previous Page</a>
            </div>
        </div>  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>        
    </nav>
    <div style="text-align: center;">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <span>{!! \Session::get('success') !!}</span>
            </div>
        @endif
        @if (Session::has('warning'))
            <div class="alert alert-warning">
                <span>{!! \Session::get('warning') !!}</span>
            </div>
        @endif
        @if (Session::has('missing'))
            <div class="alert alert-danger">
                <span>{!! \Session::get('missing') !!}</span>
            </div>
        @endif        
        <form action="{{ route('companyNextPageAddFuncVer') }}" id="add">
            @csrf
            <label for="">Company Name</label>  
            <p><input type="text" name="name" placeholder="Input Company Name"></p>   
            <p>
                <select class="form-select" name="product" aria-label="Default select example">
                    <option selected>Select Product</option>
                    <option value="Pig">Pig</option>
                    <option value="Cow">Cow</option>
                    <option value="Duck">Duck</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Fish">Fish</option>
                    <option value="Rabbit">Rabbit</option>
                    <option value="Crocodile">Crocodile</option>
                </select> 
            </p>                              
            <label for="">Country</label>  
            <p><input type="text" name="country" placeholder="Input Country"></p>  
            <label for="">History</label>  
            <p><input type="text" name="history" placeholder="Input History"></p> 
            <label for="">History</label>  
            <p><input type="file" name="img"></p>    
            <input type="button" onclick="myFunction()" value="Submit form">                 
        </form>
    </div>

    {{-- Bootstrap --}}    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

    <script>
        function myFunction() {
        document.getElementById("add").submit();
        }
    </script>
</body>
</html>