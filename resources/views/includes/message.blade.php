@if (Session('success'))
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{ Session('success') }}</strong>
    </div>
@endif

@if (Session('danger'))
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{ Session('danger') }}</strong>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <strong>{{ $error }}</strong>
    </div>
    @endforeach
@endif