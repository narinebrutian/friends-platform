// const path = "{{ route('autocomplete-search) }}";
// location.href = path;
// $('#search').typeahead({
//     source: function (query, process) {
//         return $.get(path, {query: query}, function (data) {
//             return process(data);
//         })
//     }
// });

$(document).ready(function () {

   $('.addFriend').click(function () {
       $(this).toggleClass('btn-warning').text($(this).text() === 'Add Friend' ? 'Requested' : 'Add Friend');
       console.log($(this).attr('data-id'))
   });



});
