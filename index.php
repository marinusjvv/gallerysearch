<html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <script src="public/js/index.js"></script>
</head>
<body>
<div class="top-bar">
    <div class="top-bar-title">
        <p class="top-bar-title">Flickr search</p>
    </div>
    <div class="top-bar-search">
        <input type="text" id="search" name="search" placeholder="Search Images" class="form-control" autocomplete="off">
        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Search</button>
    </div>
</div>
<div class="main-body">
    <div class="left-column">
        <div class="left-arrow navigation-button" id="navigation_button_left" data-page="0"><img src="public/images/left.png"></div>
    </div>
    <div class="main-column">
        <div class="search-start-prompt"><h1>Type a query in the box above and hit enter to search</h1></div>
        <div class="main-content">
            <div class="thumbnail-container" id="thumbnail_picture_1">
                <h2></h2>
                <img class="thumbnail-container-img" src="public/images/default_image.png">
            </div>
            <div class="thumbnail-container" id="thumbnail_picture_2">
                <h2></h2>
                <img class="thumbnail-container-img" src="public/images/default_image.png">
            </div>
            <div class="thumbnail-container" id="thumbnail_picture_3">
                <h2></h2>
                <img class="thumbnail-container-img" src="public/images/default_image.png">
            </div>
            <div class="thumbnail-container" id="thumbnail_picture_4">
                <h2></h2>
                <img class="thumbnail-container-img" src="public/images/default_image.png">
            </div>
            <div class="thumbnail-container" id="thumbnail_picture_5">
                <h2></h2>
                <img class="thumbnail-container-img" src="public/images/default_image.png">
            </div>
        </div>
    </div>
    <div class="right-column">
        <div class="right-arrow navigation-button" id="navigation_button_right" data-page="2"><img src="public/images/right.png"></div>
    </div>
</div>
</body>
</html>