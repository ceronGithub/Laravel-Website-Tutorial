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
            <a href="{{ route('addNextPageVer') }}" class="dropdown-item">Add Company<ion-icon name="add-circle-outline"></ion-icon>
            </a>
            </div>
        </div>  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>        
    </nav> 
    @if (Session::has('success'))
        <div class="alert alert-success" style="text-align: center;">
            <span>{!! \Session::get('success') !!}</span>
        </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert-warning" style="text-align: center;">
            <span>{!! \Session::get('warning') !!}</span>
        </div>
    @endif
    @if (Session::has('missing'))
        <div class="alert alert-danger" style="text-align: center;">
            <span>{!! \Session::get('missing') !!}</span>
        </div>
    @endif   
    <div style="padding-left: 200px; padding-right: 200px;">
        <table id="example" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Country</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($company as $companies)
                    <tr>                        
                        <td>{{ $companies->name }}</td>
                        <td>{{ $companies->product }}</td>
                        <td>{{ $companies->country }}</td>                        
                        <td>
                            <a href="{{ route('viewNextPageVer', $companies->id) }}" class="btn btn-outline-info company_view" 
                                        style="border: none;">
                                        <ion-icon name="eye-outline"></ion-icon>
                            </a>
                            <a href="{{ route('editNextPageVer', $companies->id) }}" class="btn btn-outline-primary update_company"                                        
                                        style="border: none;">
                                        <ion-icon name="settings-outline"></ion-icon>
                            </a> 
                            @if (count($company) > 1)
                                <a href="{{ route('deleteNextPageVer', $companies->id) }}" class="btn btn-outline-danger" 
                                    style="border: none;"><ion-icon name="trash-outline"></ion-icon>
                                </a> 
                            @endif                                                                  
                            <a href="#" class="btn btn-outline-success" style="border: none;"><ion-icon name="arrow-forward-circle-outline"></ion-icon></a>                                                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{--
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>         
            --}}
        </table>
        {{--{{ $company->links() }}--}}        
    </div>
    
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
    <style>      
        tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }        
        </style>    
    <script>
        //DELETE FUNCTION    
        function deleteFunction(getID)
        {
            $('#deleteID').val(getID); 
            event.preventDefault();                                                                                                                                                                                                      
            document.getElementById('deleteForm').submit();
        }    
        //EDIT MODAL
        $(".update_company").click(function() {
            var company_id = $(this).attr('data-edit-id');                      
            document.getElementById("companyID").value = company_id;
        });        
        //VIEW MODAL
        $(".company_view").click(function() { 
            var company_name = $(this).attr('data-view-name');
            var company_product = $(this).attr('data-view-product');
            var company_country = $(this).attr('data-view-country');
            var company_history = $(this).attr('data-view-history');
                        
            document.getElementById("Cname").innerHTML  = company_name;
            document.getElementById("Cproduct").innerHTML  = company_product;
            document.getElementById("Ccountry").innerHTML  = company_country;
            document.getElementById("Chistory").innerHTML  = company_history;
        });
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function () {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });            
            $('#example').DataTable({
                //tfoot search bar
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;
        
                            $('input', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },   
                //search bar auto            
                searching: {
                    return: true,
                },
                order: [[3, 'desc']],
            });
        });
    </script>
</body>
</html>