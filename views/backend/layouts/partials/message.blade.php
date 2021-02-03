@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>

    </div>
@endif



 @if(Session::has('success'))
   
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4>{{ Session('success') }}</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif


@if(Session::has('successfully'))
   
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4>{{ Session('successfully') }}</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif