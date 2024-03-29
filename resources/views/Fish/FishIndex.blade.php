@extends('layouts.productNav')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/fish/fish.css') }}">
@endsection
@section('content')
<button id="test">Try</button> 
    <h1>Fish</h1>   
    <div class="row" style="width: 100%"> 
        @foreach ($products as $item)
        <div class="col-sm-3">
            <a class="product__information" 
            data-toggle="modal" 
            data-target="#ViewModal">
                <div class="card" style="width: 18rem; margin-left: 4rem; margin-bottom:25px;">
                    {{--
                        <img src="{{ asset($item->product_image[0] ?? '') }}" alt="image">
                    --}}
                        @foreach (json_decode($item->product_image) as $index => $image)
                        @if ($index == 0)
                            <label for=""> 
                                <img src="{{ asset($image) }}" style="display:block;margin:auto; width: 200px; height: 200px; background-size: cover;">
                            </label>
                        @endif
                        @endforeach
                    <div class="card-body">
                    <h5 class="card-title">Product Name:</h5>
                    <p class="card-text">{{$item->product_name}}.</p>
                    </div>
                </div>
            </a>
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
        <div class="modal-dialog" role="document" style="max-width: 40%;">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('fish.create') }}" method="post" enctype="multipart/form-data">
                    @csrf       
                    <div class="modal-body">
                        <div style="float: left; display: inline-block;">
                            <ul class="a" style="list-style: none; text-align:center;">
                                <li style="margin-bottom: 15px;">Product Name</li>
                                <li style="margin-bottom: 15px;">Product Price</li>
                                <li style="margin-bottom: 15px;">Product Image</li>
                                <li style="margin-bottom: 15px;">Company</li>
                            </ul>                        
                        </div>
                        <div style="float: right; display: inline-block;">
                            <ul class="b" style="list-style: none; text-align: center;">
                                <li style="margin-bottom: 10px;"><input type="text" name="product_name" id="product_name"></li>
                                <li style="margin-bottom: 10px;"><input type="number" name="product_price" id="product_price"></li>
                                <li style="margin-bottom: 10px;"><input multiple type="file" name="product_image[]"></li>
                                <li style="margin-bottom: 10px;"><input type="text" id="company_id" name="company_id" value="{{ $companyData->id }}"></li>
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
    {{-- Start ViewModal --}}
    <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 40%;">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf       
                    <div class="modal-body">
                        <div style="float: left; display: inline-block;">
                            <ul class="a" style="list-style: none; text-align:center;">
                                <li style="margin-bottom: 15px;">Product Name</li>
                                <li style="margin-bottom: 15px;">Product Price</li>
                                <li style="margin-bottom: 15px;">Product Image</li>
                                <li style="margin-bottom: 15px;">Company</li>
                            </ul>                        
                        </div>
                        <div style="float: right; display: inline-block;">
                            <ul class="b" style="list-style: none; text-align: center;">
                                <li style="margin-bottom: 10px;"><input type="text" name="product_name" id="product_name"></li>
                                <li style="margin-bottom: 10px;"><input type="number" name="product_price" id="product_price"></li>
                                <li style="margin-bottom: 10px;"><input multiple type="file" name="product_image[]"></li>
                                <li style="margin-bottom: 10px;"><input type="text" id="company_id" name="company_id" value="{{ $companyData->id }}"></li>
                            </ul>                        
                        </div>  
                    </div>      
                    <div class="modal-footer" style="positon:fixed; bottom:0; width: 100%;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>                     
                </form>                                             
            </div>
        </div>
    </div>
    {{-- End ViewModal --}}
    
@endsection
@section('custom-scripts')
    <script src="{{ asset('/js/fish/fish.js') }}"></script>
@endsection