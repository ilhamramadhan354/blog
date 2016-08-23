<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Article</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Article</h1>            
                <a href="{{ url('articles') }}"><button class = 'btn blue'>Article Index</button></a>                         
             <div class="row">
              <div class="col s4">
                 <img src="{{ asset('images/upload/'.$article->photo)  }}" class="materialboxed"  width="650"> 
              </div>              
             </div>            
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="material-icons">chat</i>Add Comments</div>
                  <div class="collapsible-body">
                  <div class="container">
                      <div class="row">
                        <form class="col s12" method="POST" action = '{{url("/comments")}}'>
                        {{ csrf_field() }}
                          <div class="row">
                          <div class="input-field col s12">
                              <input id="icon_prefix" type="text" name="article_id" value="{{$article->id}}" readonly class="validate">
                              <label for="icon_prefix">Article Id</label>
                             </div>                            
                             <div class="input-field col s12">
                              <textarea id="textarea1" name="content" class="materialize-textarea" required></textarea>
                              @if ($errors->has('content'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('content') }}</p>
                                    </span>
                                @endif
                              <label for="textarea1">Content Comment</label>
                             </div>
                             <div class="input-field col s6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="icon_prefix" type="text" name="user" class="validate">
                              <label for="icon_prefix">User</label>
                             </div>
                             <div class="row">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Post
                                  <i class="mdi-content-send right"></i>
                                </button>
                              </div>                             
                           </div>
                         </form>
                    </div>
                  </div>
                </li>
              </ul>   
              <h4>Comments</h4> 
              @foreach($comments as $comment)
              <div class="row">
                <div class="col s12">
                  <div class="card  blue lighten-3">
                    <div class="card-content white-text">
                      <span class="card-title">{!! $comment->user !!}</span>
                      <p>{!! $comment->content !!}</p>
                    </div>
                  </div>
                </div>
              </div>       
              @endforeach          
        </div>  
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
     $('.materialboxed').materialbox();
     });

      $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });
        
     </script>
</html>