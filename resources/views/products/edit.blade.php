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
	<div class="card-panel purple darken-3 white-text">Edit Articles</div>
</div>

<div class="section">
  <form action="{{ url('update', $showedit->id) }}" method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
    <div class="row">
          <div class="input-field col s6">
            <input type="text" class="validate" name="caption" value="{{ $showedit->caption }}">
            <label for="title">Caption</label>
          </div>
    </div>
    <div class="row">
          <div class="input-field col s6">
            <input type="text" class="validate" name="contents" value="{{ $showedit->contents }}">
            <label for="title">Contents</label>
          </div>
    </div>
    <div class="row">
        <div class="col s6">
            <img src="{{ asset('image/'.$showedit->images) }}" id="showimage" style="max-width:200px;max-height:200px;float:left;" />
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
          <input type="file" id="inputimage" name="images" class="validate"/ >
        </div>
      
      <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light white-text right">Submit <i class="material-icons right">send</i></button>
  </form>
</div>

@endsection