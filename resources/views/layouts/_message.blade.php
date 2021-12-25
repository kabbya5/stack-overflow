@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Succsess!</strong> {{ session('success') }}
        <button type="button" class="close" date-dismiss = "alert" aria-label="Close">
            
            <span aria-hidden="true">&times;</span>
        </button>
        
    </div>

@endif