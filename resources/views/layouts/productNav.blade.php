<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px;">
        <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
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
            <a href="#" class="dropdown-item"                                         
                        data-toggle="modal" 
                        data-target="#addModal">Add Company
                        <ion-icon name="add-circle-outline"></ion-icon>
            </a>
            </div>
        </div>  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>        
    </nav>    
    <main class="py-4">
        @yield('content')
    </main>    
    {{-- end Delete Modal --}}    
    {{-- Bootstrap --}}    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- Icons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>    
    {{-- DataTables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>  
    {{-- Export File --}}
    {{-- Style --}}    
</body>
</html>