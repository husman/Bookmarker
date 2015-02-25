<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookmarks</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/css/core.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="static/assets/js/bookmark.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="new-bookmark left">
                    <input type="text" id="bookmark-title" placeholder="Title" />
                    <input type="text" id="bookmark-url" placeholder="URL" />
                    <button class="btn btn-warning add-new-bookmark">Create</button>
                </div>
                <a href="/src/?c=login&a=logout" class="btn btn-default navbar-btn right">Sign out</a>

                <div class="clear"></div>
            </div>
        </nav>

        <!-- List all user bookmarks -->
        <table class="table table-striped" id="bookmark-list">
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Created Date</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($bookmarks as $bookmark) { ?>
                <tr id="bookmark_<?php echo $bookmark->id; ?>">
                    <td><?php echo $bookmark->title; ?></td>
                    <td><?php echo $bookmark->created_date; ?></td>
                    <td><a href="<?php echo $bookmark->url; ?>" target="_blank">Visit</a></td>
                    <td>
                        <a href="Javascript:void(0);"
                           data-id="<?php echo $bookmark->id; ?>"
                           class="remove-bookmark-btn">
                            Remove
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>