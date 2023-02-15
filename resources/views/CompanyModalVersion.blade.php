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
    <div style="padding-left: 200px; padding-right: 200px;">
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
                            <a href="#" class="btn btn-outline-info company_view" 
                                        data-toggle="modal" 
                                        data-target="#viewModal"
                                        data-view-name="{{ $companies->name }}"
                                        data-view-product="{{ $companies->product }}"
                                        data-view-country="{{ $companies->country }}"
                                        data-view-history="{{ $companies->history }}"
                                        style="border: none;">
                                        <ion-icon name="eye-outline"></ion-icon>
                            </a>
                            <a href="#" class="btn btn-outline-primary update_company" 
                                        data-toggle="modal" 
                                        data-target="#editModal"
                                        data-edit-id="{{ $companies->id }}"                                       
                                        style="border: none;">
                                        <ion-icon name="settings-outline"></ion-icon>
                            </a>                            
                            <a href="#" class="btn btn-outline-danger delete_company" 
                                        data-toggle="modal"
                                        data-target="#deleteModal" 
                                        data-delete-id="{{ $companies->id }}"
                                        data-delete-name="{{ $companies->name }}"
                                        data-delete-product="{{ $companies->product }}"
                                        data-delete-country="{{ $companies->country }}"
                                        data-delete-history="{{ $companies->history }}" 
                                        data-delete-img="{{ $companies->img }}"                            
                                        style="border: none;"><ion-icon name="trash-outline"></ion-icon></a>                                                        
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
        {{ $company->links() }}
    </div>
    {{-- Start Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('addNewCompanyModalVer') }}" method="post" enctype="multipart/form-data">
                    @csrf                    
                    <div class="modal-body" >                                                
                        <div class="container" style="text-align: center;">
                            <h5>Company Name</h5>
                            <input type="text" name="name">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>Product</h5>
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
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>Country</h5>
                            <input type="text" name="country">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>History</h5>
                            <input type="text" name="history">
                        </div>  
                        <div class="container" style="text-align: center;">
                            <h5>Image</h5>
                            {{--<input multiple type="file" id="image" name="image[]"> For multiple image upload--}}                            
                            <input type="file" id="image" name="img">
                        </div>                                                                                                                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Company</button>
                    </div> 
                </form>                                             
            </div>
        </div>
    </div>    
    {{-- End Add Modal --}}
    {{-- Start View Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" >
                    <div style="float: left; display: inline-block; padding-left: 0px;">
                        <ul class="a" style="list-style: none; text-align:center;">
                            <li>Company Name</li>
                            <li>Product</li>
                            <li>Country</li>
                            <li>History</li>
                        </ul>                        
                    </div>
                    <div style="float: right; display: inline-block; padding-right:30px;">
                        <ul class="b" style="list-style: none;text-align:center;">
                            <li id="Cname">...</li>
                            <li id="Cproduct">...</li>
                            <li id="Ccountry">...</li>
                            <li id="Chistory">...</li>
                        </ul>                        
                    </div>                    
                </div>                              
            </div>
        </div>
    </div>    
    {{-- End View Modal --}}
    {{-- Start Edit Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('updateCompanyModalVer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ID" id="companyID">
                    <div class="modal-body" >                                                
                        <div class="container" style="text-align: center;">
                            <h5>Company Name</h5>
                            <input type="text" name="updateName" id="updateName">
                        </div>                        
                        <div class="container" style="text-align: center;">
                            <h5>Country</h5>
                            <input type="text" name="updateCountry" id="updateCountry">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>History</h5>
                            <input type="text" name="updateHistory" id="updateHistory">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>Product</h5>
                            <select class="form-select" name="updateProduct" id="updateProduct" aria-label="Default select example">
                                <option selected>Select Product</option>
                                <option value="Pig">Pig</option>
                                <option value="Cow">Cow</option>
                                <option value="Duck">Duck</option>
                                <option value="Chicken">Chicken</option>
                                <option value="Fish">Fish</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="Crocodile">Crocodile</option>
                            </select>                                                        
                        </div>                          
                        <div class="container" style="text-align: center;">
                            <h5>Image</h5>
                            <input type="file" name="updateImg" id="updateImg">
                        </div>                                                                                                                                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div> 
                </form>                                             
            </div>
        </div>
    </div>
    {{-- end Edit Modal --}}
    {{-- Start Delete Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('deleteCompanyModalVer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="..." name="ID" id="deleteID" >
                    <div class="modal-body" >                                                
                        <div class="container" style="text-align: center;">
                            <h5>Company Name</h5>
                            <input type="text" value="..." name="deleteName" id="deleteName">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>Product</h5>
                            <input type="text" value="..." name="deleteProduct" id="deleteProduct">
                        </div>
                        <div class="container" value="..." style="text-align: center;">
                            <h5>Country</h5>
                            <input type="text" value="..." name="deleteCountry" id="deleteCountry">
                        </div>
                        <div class="container" style="text-align: center;">
                            <h5>History</h5>
                            <input type="text" value="..." name="deleteHistory" id="deleteHistory">
                        </div>  
                        <div class="container" style="text-align: center;">
                            <h5>Image</h5>
                            <input type="text" value="..." name="deleteImg" id="deleteImg">
                        </div>                                                                                                                                 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div> 
                </form>                                             
            </div>
        </div>
    </div>
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
    <style>      
        tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }        
        </style>    
    <script>
        //DELETE MODAL
        $(".delete_company").click(function() { 
            var company_id = $(this).attr('data-delete-id');
            var company_name = $(this).attr('data-delete-name');
            var company_product = $(this).attr('data-delete-product');
            var company_country = $(this).attr('data-delete-country');
            var company_history = $(this).attr('data-delete-history');
            var company_img = $(this).attr('data-delete-img');            

            document.getElementById("deleteID").value = company_id;
            document.getElementById("deleteName").value = company_name;
            document.getElementById("deleteProduct").value  = company_product;
            document.getElementById("deleteCountry").value  = company_country;
            document.getElementById("deleteHistory").value  = company_history;
            document.getElementById("deleteImg").setAttribute('value', company_img);
        });

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

        //TABLE DOM
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