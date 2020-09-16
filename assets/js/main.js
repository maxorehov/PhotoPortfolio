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
            columnWidth: 300
          });
      
});

let item = document.querySelector('.goto-portfolio');
    to = document.querySelector('.portfolio'),
    gotoStart = document.querySelector('.goto-start'),
    main = document.querySelector('.main');

gotoStart.addEventListener('click', () => {
    main.scrollIntoView({behavior: 'smooth'});
})

item.addEventListener('click', () => {
    to.scrollIntoView({behavior: 'smooth'});
});

function addField() {
    var el = $("p:last").clone();
    $(".mass").append(el);
}

function removeField() {
    $(".mass p:last").remove();
}





