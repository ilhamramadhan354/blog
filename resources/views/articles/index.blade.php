
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
    <style type="text/css">
    .content-columns {
  list-style: none;

  -moz-column-count: 4;
    -webkit-column-count: 4;
    column-count: 4;

    -webkit-column-gap: 15px;
    -moz-column-gap: 15px;
    column-gap: 15px;
}</style>  
    <body>
    @section('content')
        <div class = 'container'>
            <h1>Articles Index</h1>
            <div class="row">
                <form class = 'col s3' method = 'get' action = '{{url("/articles")}}/create'>
                    <button class = 'btn red' type = 'submit'>Create New Article</button>
                </form>     
            </div>      
                 @foreach($articles as $article)   
                     <div class="row">
                       <div class="col s4">
                       <div class="card">
                        <div class="card-image">                          
                          <img src="{{ asset('images/upload/'.$article->photo)  }}" class="materialboxed">                                                                                                    
                          <span class="card-title"><p>{{$article->title}}</p></span>
                        </div>
                        <div class="card-content">
                          <p>{{$article->content}}</p>
                        </div>
                        <div class="card-action center">
                            <a href = "{{ url('articles/delete', $article->id) }}"  class = 'delete btn-floating modal-trigger red'><i class = 'material-icons'>delete</i></a>
                            <a href = "{{ url('articles/edit', $article->id) }}" class = 'viewEdit btn-floating blue' ><i class = 'material-icons'>edit</i></a>
                            <a href = "{{ url('articles/show', $article->id) }}" class = 'viewShow btn-floating orange'><i class = 'material-icons'>visibility</i></a>                
                        </div>
                       </div>
                      </div>
                  @endforeach                                         
    </body>

    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script> var baseURL = "{{URL::to('/')}}"</script>
    <script src = "{{ URL::asset('js/AjaxisMaterialize.js')}}"></script>
    <script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
    <script src="{{ URL::asset('masonry/js/masonry.docs.min.js')}}"></script>
    <script src="{{ URL::asset('masonry/masonry.pkgd.min.js')}}"></script>         
</html>
@endsection