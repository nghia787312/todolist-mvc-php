<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create todo list</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>
<body>

<div class="container">
    <h2 style="text-align: center">Edit</h2>
    
    <?php require_once('resources/views/error/index.php') ?>
    
    <form action="edit?id=<?= $context['id'] ?>" method="POST">
        <div class="form-group">
            <label for="work_name">Work name:</label>
            <input type="text" class="form-control" id="work_name" placeholder="Enter work name" name="name" value="<?= $context['name'] ?>">
        </div>
        <div class="form-group">
            <label for="start_date">Starting Date:</label>
            <input type="text" id="start_date" name="start_date" value="<?= $context['start_date'] ?>">
        </div>
        <div class="form-group">
            <label for="end_date">Ending Date:</label>
            <input type="text" id="end_date" name="end_date" value="<?= $context['end_date'] ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-select" aria-label="Default select example" name="status" required>
                <option value="1" <?php if($context['status'] == WORK_STATUS_PLANING) echo "selected"; ?> >Planing</option>
                <option value="2" <?php if($context['status'] == WORK_STATUS_DOING) echo "selected"; ?> >Doing</option>
                <option value="3" <?php if($context['status'] == WORK_STATUS_COMPLETE) echo "selected"; ?> >Complete</option>
            </select>
        </div>
        <button class="btn btn-default">
            <a href="/" style="color: inherit;text-decoration: none;">Back</a>
        </button>
     
        <button type="submit" class="btn btn-default">Edit</button>
    </form>
</div>

</body>
</html>

<script src="public/js/todo.js"></script>
