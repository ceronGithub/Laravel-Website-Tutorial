<a href="{{ route('companyNextPageVer') }}">return to Previous Page</a>
<form action="{{ route('updateNextPageVer') }}" method="post">
    @csrf
    <div style="text-align: center;">
        <h1>Update Details</h1>
        <h2>Name:</h2>
        <input type="text" name="name">
        <h2>Product:</h2>
        <input type="text" name="product">
        <h2>Country:</h2>
        <input type="text" name="country">
        <h2>History:</h2>
        <input type="text" name="history">
        <br>
        <input type="hidden" name="id" value="{{ $company->id }}">        
        <button type="submit" class="btn btn-primary">Save Changes</button>        
    </div>
</form>