$(document).ready(function() {
   $(document).on('click', 'input[type="button"][value != "+"]', removeField);
   $(document).on('click', 'input[type="button"][value != "-"]', addField);
   $('#delFotos').on('change', function() {
       
       $.ajax({
           url: '../../core/showDelFotos.php?id=' + $(this).val()
       }).done(function(data) {
           $('#ans').append(data);
       })
               
   })
});

function addField() {
    console.log('+')
    $("p:last").clone().insertAfter("p:last");
}

function removeField() {
    console.log('-');
    $("p:last").remove();
}


