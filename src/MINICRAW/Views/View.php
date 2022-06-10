<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Craw</title>
</head>
<body>
    <!-- Add a link to get data -->
    <form class="row_form" method="post" novalidate="novalidate">
            <div class="form-group">
            <label for="urlPage">Enter the link here</label>
            <input type="text" class="form-control" id="urlPage" name="url_page" placeholder="Enter link">
            </div>
            <button type="submit" name="button_save" class="btn btn-primary">Submit</button>
    </form>

    <!-- Display Information of the article -->
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $arr['date'][1] ?></td>
                <td><?php echo $arr['title'][0] ?></td>
                <td><?php echo $arr['description'][0] ?></td>
                <td><?php echo $arr['details'][0] ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

<?php
    if (isset($_POST['button_save'])) {
        if (isset($_POST['url_page'])) {
            $url_page = $_POST['url_page'];
            echo $url_page;
        } else {
            $url_page = " ";
        }
    }
?>