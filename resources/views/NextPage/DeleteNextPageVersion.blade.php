<a href="{{ route('companyNextPageVer') }}">return to Previous Page</a>
<form action="{{ route('deleteFunction', $company->id) }}" method="post">
    @csrf
    <div style="text-align: center;">
        <h1>Company Details</h1>
        <h2>Name:</h2>
        <h5>{{ $company->name }}</h5>
        <h2>Product:</h2>
        <h5>{{ $company->product }}</h5>
        <h2>Country:</h2>
        <h5>{{ $company->country }}</h5>
        <h2>History:</h2>
        <h5>{{ $company->history }}</h5>
        <br>              
        <button type="submit" class="btn btn-primary">Remove Record</button>        
    </div>
</form>