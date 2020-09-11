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




   

        // $('.logo').on('click', function(e){
        //     var fixedOffset = 1000;
        //     $('html,body').stop().animate({ scrollTop: $('#first').offset().top + fixedOffset }, 500);
        //     e.preventDefault();
        // });
        
      
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





