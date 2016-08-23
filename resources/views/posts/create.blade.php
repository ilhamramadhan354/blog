<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Post</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Post</h1>
            <form method = 'get' action = '{{url("posts")}}'>
                <button class = 'btn blue'>Post Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("posts")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="title" name = "title" type="text" class="validate">
                    <label for="title">title</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="content" name = "content" type="text" class="validate">
                    <label for="content">content</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="author" name = "author" type="text" class="validate">
                    <label for="author">author</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="desc" name = "desc" type="text" class="validate">
                    <label for="desc">desc</label>
                </div>
                
                
                <button class = 'btn red' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script>
    $('select').material_select();
    </script>
</html>
