$(document).ready(function() {
   $(document).on('click', 'input[type="button"][value != "+"]', removeField);
   $(document).on('click', 'input[type="button"][value != "-"]', addField);
});

function addField() {
    console.log('+')
    $("p:last").clone().insertAfter("p:last");
}

function removeField() {
    console.log('-');
    $("p:last").remove();
}