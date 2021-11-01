@if ($errors->any())
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="text-sm">{{ $error }}</span></li>
            @endforeach
        </ul>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('successful'))
    <div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm">{{ session()->get('successful') }}</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
