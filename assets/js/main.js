$(document).ready(function() {
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true
    });
    
    
    $('#comment_form').submit(function(e) {
        e.preventDefault();
        let data = {};
        data.name = $(this).find("input[name=name]").val();
        data.comment = $(this).find("textarea[name=comment").val();
        data.albumId = $(this).find("input[name=album_id").val();
        $.ajax({
            url: '/core/addComment.php',
            type: 'POST',
            data: data,
        }).done(function(res) {
            $('#comment_form')[0].reset();
            $('.msg').empty();
            $('.msg').prepend(res);
        })
    });
    
});









