$(document).ready(function () {
    $('#search').on('keyup', function () {
        let query = $(this).val();
        $.ajax({
            url: "search",
            type: "GET",
            data: {'search': query},
            success: function(data){
                $('#search_list').html(data);
            }
        })
    });
    //end of ajax call
});
