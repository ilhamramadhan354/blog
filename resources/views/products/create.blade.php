@section('js')
<script type="text/javascript">
  function readURL(input)
  if (input.files && input.files[0]) {
    var reader = new FileReader(){
      reader.onload = function (e){
        $('#showimage').attr('src',e.target.result);
      }
      reader.readDataURL(input.files[0]);
    }
  }
  $(#inputimage).change(function(){
    readURL(this);
  });
</script>
@stop
@extends('layouts.index')
@section('content')

<div class="section">
	<div class="card-panel purple darken-3 white-text">Add Articles</div>
</div>

<div class="section">
  <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
    <div class="row">
          <div class="input-field col s6">
            <input type="text" class="validate" name="name">
            <label for="title">Name</label>
          </div>
    </div>
    <div class="row">
          <div class="input-field col s6">
            <input type="text" class="validate" name="model">
            <label for="title">Model</label>
          </div>
    </div>
     <div class="row">
        <div class="input-field col s6">
          <input type="file" id="inputimage" name="photo" class="validate"/ >
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="desc"></textarea>
          <label for="textarea1">Description</label>
        </div>
      </div>        
      <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light white-text right">Submit <i class="material-icons right">send</i></button>
  </form>
</div>
@endsection