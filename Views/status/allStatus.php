<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://rawgit.com/myclabs/jquery.confirm/master/jquery.confirm.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php /** @var \MVC\ViewModels\StatusViewModel[] $model */?>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p>
                <a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
                <a class="btn btn-primary" href="http://localhost:8004/Web-Development-Basics-Retake/status/addstatus"><span class="glyphicon glyphicon-plus"></span>Add Status</a></p>
            </p>
            <br/>
            <div class="table-responsive">
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Id','Status Name','Delete'])
    ->setContentStatus($model)
    ->render();
?>

            </div>
        </div>
    </div>
</div>


<script>
    $(".confirm").confirm({
        text: "Are you sure you want to delete that status?",
        title: "Confirmation required",

        confirm: function(button) {
            var id = $(button).attr('id');
            $.ajax({
                url:'http://localhost:8004/Web-Development-Basics-Retake/status/delete/'+id,
                method:"POST"
            }).always(function() {
                $('#tr-'+id).remove();
            });
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes I am",
        cancelButton: "No",
        post: true,
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });
</script>

