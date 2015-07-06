function Index () {
    var self = this;

    this.constructor = function () {
        self.bind();
    },
            
    this.bind = function () {
        $('#submit').on('click', function (event) {
            event.preventDefault();
            self.searchImages(1);
            return false;
        });
        $('.navigation-button').on('click', function (event) {
            event.preventDefault();
            page = $(event.currentTarget).data('pagenav');
            self.searchImages(page);
            return false;
        });
        $('.thumbnail-container-img').on('click', function (event) {
            event.preventDefault();
            url = $(event.currentTarget).attr('src');
            var win = window.open(url, '_blank');
            if(win){
                win.focus();
            }else{
                alert('Please allow popups for this site');
            }
            return false;
        });
    },
            
    this.searchImages = function(page) {
        $('#navigate_right, #navigate_left').hide();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/GallerySearch/search.php',
            data: $('#data_form').serialize() + '&page=' + page,
            success: function (returned) {
                returned = $.parseJSON(returned);
                if (returned.status == 'success') {
                    self.showThumbnails(returned.pictures_data);
                    self.showNav(returned.page_data);
                } else {
                    alert(returned.message);
                }
            }
        });
    },
            
    this.showThumbnails = function(returned) {
        count = 1;
        $.each(returned, function(index, value){
            container = $('#thumbnail_picture_' + count);
            container.find('img').attr("src", value);
            count++;
        });
    },
            
    this.showNav = function(returned) {
        if (parseInt(returned.page, 10) > 1) {
            page = parseInt(returned.page, 10) - 1;
            $('#navigate_left').data('pagenav', page).show();
        }
        if (parseInt(returned.page, 10) < parseInt(returned.pages, 10)) {
            page = parseInt(returned.page, 10) + 1;
            $('#navigate_right').data('pagenav', page).show();
        }
    }
}

$(document).ready( function() {
    index = new Index();
    index.constructor();
})