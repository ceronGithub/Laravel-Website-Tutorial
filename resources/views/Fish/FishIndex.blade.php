@extends('layouts.productNav')

@section('content')
    <h1>Fish</h1>   
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
    <button id="test">Try</button> 
    
    
@endsection
@section('custom-scripts')
    <script src="{{ asset('/js/fish/fish.js') }}"></script>
@endsection