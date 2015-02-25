$(document).ready(function () {
    // Add a click event handler for adding new bookmarks
    $('.add-new-bookmark').click(function () {
        $.ajax({
            type: 'POST',
            url: '/src/?c=bookmark&a=add',
            dataType: 'json',
            data: {
                title: $('#bookmark-title').val(),
                url: $('#bookmark-url').val()
            }
        }).done(function (response) {
            // add new row to table
            $('#bookmark-list tbody').append(
                '<tr id="bookmark_' + response.id + '">' +
                '<td>' + response.title + '</td>' +
                '<td>' + response.created_date + '</td>' +
                '<td><a href="' + response.url + '" target="_blank">Visit</a></td>' +
                '<td>' +
                '<a href="Javascript:void(0);"' +
                'data-id="' + response.id + '"' +
                'class="remove-bookmark-btn">' +
                'Remove' +
                '</a>' +
                '</td>' +
                '</tr>'
            );
            setupBookmarkRemoveEvents();
        })
    });

    // Remove bookmark on user's request
    function setupBookmarkRemoveEvents() {
        $('.remove-bookmark-btn').click(function () {
            bookmark_id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '/src/?c=bookmark&a=remove',
                data: {
                    id: bookmark_id
                }
            }).done(function (response) {
                $('#bookmark_' + bookmark_id).remove();
            });

        });
    }

    setupBookmarkRemoveEvents();

});