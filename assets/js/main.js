$(document).ready(function() {
    $(document).on('click', 'input[type="button"][value != "+"]', removeField);
    $(document).on('click', 'input[type="button"][value != "-"]', addField);
    
    $('#delFotos').on('change', function() {
        $('#ans').empty();
        $.ajax({
           url: '../../core/showDelFotos.php?id=' + $(this).val()
        }).done(function(data) {
           $('#ans').append(data);
        })
               
    })

    $('.grid').masonry({
        // options

        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true
    });
      
});




function addField() {
    var el = $("p:last").clone();
    $(".mass").append(el);
}

function removeField() {
    $(".mass p:last").remove();
}

// console.log(window.location.href);





