<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Post</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Articles</h1>
                <button class = 'btn blue'>Articles Index</button>
            </form>
            <br>            
            <form method ='POST' action ="{{ url('/update', $article->id) }}" enctype="multipart/form-data">
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="title" name = "title" type="text" class="form-control" value="{{$article->title}}">
                    <label for="title">title</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="content" name = "content" type="text" class="form-control" value="{{$article->content}}">
                    <label for="content">content</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="author" name = "author" type="text" class="form-control" value="{{$article->author}}">
                    <label for="author">author</label>
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
                </div>                
                <button class = 'btn red' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script>
    $('select').material_select();
    </script>
</html>
