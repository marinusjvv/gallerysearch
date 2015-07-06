<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <style>
            .thumbnail-container-img{
                height:150px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Flickr search</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <form id="data_form" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search Images" class="form-control" autocomplete="off">
                    </div>
                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Search</button>
                  </form>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron">
            <div class="container">
                <h1>Search Images</h1>
                <p>Type a tag to search by in the top right box. You may enter multiple tags separated by commas</p>
            </div>
        </div>
        
        <div class="container">
            <div class="col-md-1">
                <button id="navigate_left" class="btn btn-default btn-lg navigation-button" type="button" style="display:none" data-pagenav="1"><span aria-hidden="true" class="glyphicon glyphicon-menu-left"></span></button>
            </div>
            <div class="col-md-10" id="thumbnails">
                <div class="row">
                    <div class="col-md-4" id="thumbnail_picture_1">
                        <h2></h2>
                        <img class="thumbnail-container-img" src="public/images/default_image.png">
                    </div>
                    <div class="col-md-4" id="thumbnail_picture_2">
                        <h2></h2>
                        <img class="thumbnail-container-img" src="public/images/default_image.png">
                    </div>
                    <div class="col-md-4" id="thumbnail_picture_3">
                        <h2></h2>
                        <img class="thumbnail-container-img" src="public/images/default_image.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-4" id="thumbnail_picture_4">
                        <h2></h2>
                        <img class="thumbnail-container-img" src="public/images/default_image.png">
                    </div>
                    <div class="col-md-4" id="thumbnail_picture_5">
                        <h2></h2>
                        <img class="thumbnail-container-img" src="public/images/default_image.png">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button id="navigate_right" class="btn btn-default btn-lg navigation-button" type="button" style="display:none" data-pagenav="1"><span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span></button>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="public/js/index.js"></script>
    </body>
</html>