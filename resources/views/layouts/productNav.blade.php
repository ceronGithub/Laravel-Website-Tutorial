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
            <a href="#" class="dropdown-item" id="ViewCart"                                        
                        data-toggle="modal" 
                        data-target="#CartModal">View Cart
                        <ion-icon name="eye-outline"></ion-icon>
            </a>
            <a href="#" class="dropdown-item" id="ViewCart"                                        
                        data-toggle="modal" 
                        data-target="#AddItemModal">Add Item                        
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
        @include('layouts.scripts')
    </main>        
</body>
</html>