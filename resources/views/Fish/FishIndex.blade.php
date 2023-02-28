@extends('layouts.productNav')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/fish/fish.css') }}">
@endsection
@section('content')
    <h1>Fish</h1> 
    <div class="row" style="width: 100%"> 
        @foreach ($products as $item)
        <div class="col-sm-2">
            <div class="card" style="width: 18rem; margin-left: 10px; margin-bottom:10px;">
                <img class="card-img-top" src="{{ $item->product_image }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>   

    {{-- Start Add Modal --}}
    <div class="modal fade" id="CartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf                                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Purchased</button>
                    </div> 
                </form>                                             
            </div>
        </div>
    </div>    
    {{-- End Add Modal --}} 
    {{-- Start AddItemModal --}}
    <div class="modal fade" id="AddItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf       
                    <div class="modal-body">
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
                    <div class="modal-footer" style="positon:fixed; bottom:0; width: 100%;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert New Record</button>
                    </div>                     
                </form>                                             
            </div>
        </div>
    </div>    
    {{-- End AddItemModal --}}        
    <button id="test">Try</button> 
    
    
@endsection
@section('custom-scripts')
    <script src="{{ asset('/js/fish/fish.js') }}"></script>
@endsection