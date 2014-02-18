$(function() {
    //Add datepicker to all inputs with datepicker class
    $('INPUT.datepicker').datepicker();
   
    //Handle checkbox ajax
    $('.todo-checkbox').change(function() {
        var currentCheckbox = $(this);
        var id = currentCheckbox.attr('id').replace('todo-', '');

        if ( currentCheckbox.is(':checked') ) {
            var checkedstate = 1;
        } else {
            var checkedstate = 0;
        }

        $.ajax({
                url : base_url + 'todo/update',
                type : 'POST',
                data : encodeURI('ajax=ajax&id=' + id + '&completed=' + checkedstate),
                dataType : 'json',
                timeout : 20000,
                success : function (data) {
                    //On success we need to toggle the completed class on the row
                    currentCheckbox.closest('tr').toggleClass('completed');
                },
                error : function(obj, errortype, errormessage) {
                    //If ajax fails for any reason, revert the users checkbox
                    if (checkedstate) {
                        currentCheckbox.attr('checked', false);
                    } else {
                        currentCheckbox.attr('checked', true);
                    }
                }
        });
   });
   
});