@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Articles</title>
    </head>
    <body>
    @section('content')
     <div class="container">
          <div class="section">

            <p class="caption">Includes predefined classes for easy layout options.</p>

            <div class="divider"></div>
            <div class="col s12 m12 l6">
                <div class="card-panel">
                  <h4 class="header2">Form with validation</h4>
                  <div class="row">
                    <form class="col s12" method ='POST' action = '{{url("/articles")}}' enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="name4" type="text" class="validate" name="title"> 
                           @if ($errors->has('title'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('title') }}</p>
                                    </span>
                                @endif
                          <label for="first_name">Title</label>
                        </div>
                      </div>
                     <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-question-answer prefix"></i>
                          <textarea id="message4" name="content" class="materialize-textarea validate" length="120"></textarea>
                             @if ($errors->has('content'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('content') }}</p>
                                    </span>
                                @endif
                          <label for="content">Content</label>
                        </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="name4" type="text" class="validate" name="author">
                           @if ($errors->has('author'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('author') }}</p>
                                    </span>
                                @endif
                          <label for="first_name">Author</label>
                        </div>
                      </div>

                      <div class="row">
                      <div class="file-field input-field col s6">
                        <input class="file-path validate" type="text"/>
                        <div class="btn">
                          <span>Photo</span>
                          <input type="file" name="photo" />
                           @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('photo') }}</p>
                                    </span>
                                @endif
                        </div>
                      </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Save
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
      
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script> var baseURL = "{{URL::to('/')}}"</script>
    <script src = "{{ URL::asset('js/AjaxisMaterialize.js')}}"></script>
    <script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
</html>
@endsection