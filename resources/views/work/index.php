<link rel="stylesheet" type="text/css" href="public/css/todo.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="script" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"/>
<script src="public/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css">

<div class="page">
    <div class="card">
        <div class="card-header">
            <p>
                <i class="fa fa-bars"></i>
                <i class="fa fa-calendar ml-4" aria-hidden="true"></i>
                <i class="fa fa-star ml-4" aria-hidden="true"></i>
                <span class="float-right">
                    <a href="show_create" class="mr-4 navTask" >Add task</a>
                </span>
            </p>
        </div>
        <div class="card-body">
           <?php require_once("resources/views/work/calendar.php")?>
        </div>
    </div>
</div>