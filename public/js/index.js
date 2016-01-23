function Index () {
    var self = this;

    this.constructor = function () {
        self.bind();
    };
            
    this.bind = function () {
        self.hideArrows();
        document.getElementById('submit').onclick = function() {
            self.searchImages(1);
        };
        var leftButton = document.getElementById('navigation_button_left');
        leftButton.onclick = function() {
            var page = leftButton.dataset.page;
            if (page > 0) {
                self.searchImages(page);
            }
        };
        var rightButton = document.getElementById('navigation_button_right');
        rightButton.onclick = function() {
            var page = rightButton.dataset.page;
            self.searchImages(page);
        };

        var images = document.getElementsByClassName('thumbnail-container-img');
        for (var i = 0; i < images.length; i++) {
            images[i].onclick = function(element) {
                var src = element.target.getAttribute('src');
                var win = window.open(src, '_blank');
                if(win){
                    win.focus();
                }else{
                    alert('Please allow popups for this site');
                }
            };
        }
        document.getElementById('search').onkeyup = function(event) {
            if (event.which === 13) {
                self.searchImages(1);
            }
        };
    };
            
    this.searchImages = function(page) {
        self.hideArrows();
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/GallerySearch/search.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var query = 'search=' + document.getElementById('search').value + '&page=' + page;
        xhttp.send(query);
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var returned = JSON.parse(xhttp.response);
                if (returned.status == 'success') {
                    document.getElementsByClassName('search-start-prompt')[0].style.display = 'none';
                    self.showThumbnails(returned.pictures_data);
                    self.showNav(returned.page_data);
                } else {
                    alert(returned.message);
                }
            }
        };
    };
            
    this.showThumbnails = function(returned) {
        for (var i=0; i<5; i++) {
            var data = returned[i];
            var container = document.getElementById('thumbnail_picture_' + (i + 1));
            container.getElementsByTagName('img')[0].setAttribute("src", data.url);
            var string = data.title.length > 50
                ? data.title.substring(0, 50) + '...'
                : data.title;
            container.getElementsByTagName('h2')[0].innerHTML = string;
            document.getElementsByClassName('main-content')[0].style.display = '';
        }
    };
            
    this.showNav = function(returned) {
        var page = parseInt(returned.page, 10);
        if (page > 1) {
            document.getElementById('navigation_button_left').setAttribute('data-page', page - 1);
            document.getElementById('navigation_button_left').style.display = '';
        }
        if (page < parseInt(returned.pages, 10)) {
            document.getElementById('navigation_button_right').setAttribute('data-page', page + 1);
            document.getElementById('navigation_button_right').style.display = '';
        }
    };

    this.hideArrows = function() {
        document.getElementById('navigation_button_left').style.display = 'none';
        document.getElementById('navigation_button_right').style.display = 'none';
        document.getElementsByClassName('main-content')[0].style.display = 'none';
    };
}

document.addEventListener("DOMContentLoaded", function(event) {
    var index = new Index();
    index.constructor();
});