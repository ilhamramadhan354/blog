<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Post</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Post</h1>
            <form method = 'get' action = '{{url("posts")}}'>
                <button class = 'btn blue'>Post Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>title : </i></b>
                        </td>
                        <td>{{$post->title}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>content : </i></b>
                        </td>
                        <td>{{$post->content}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>author : </i></b>
                        </td>
                        <td>{{$post->author}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>desc : </i></b>
                        </td>
                        <td>{{$post->desc}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
