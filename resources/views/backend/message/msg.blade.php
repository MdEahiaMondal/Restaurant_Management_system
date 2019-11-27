@if(session('success'))
    <div class="alert alert-success">
        <span> <b>Success ! </b> {{ session('success') }} </span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-success">
        <span> <b>Warning ! </b> {{ session('error') }} </span>
    </div>
@endif
