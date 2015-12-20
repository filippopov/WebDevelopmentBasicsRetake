<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://rawgit.com/myclabs/jquery.confirm/master/jquery.confirm.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p><a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a></p>
            <br/>
            <div class="table-responsive">
<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Id','Name','Delete','Admin Role','Remove Admin Role'])
    ->setContentUser($model[0])
    ->render();

?>
            </div>
        </div>
    </div>
</div>
<div id="content"></div>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <br/>
            <div class="table-responsive">

<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['AdminNames'])
    ->setContentAdmins($model[1])
    ->render();

?>
            </div>
        </div>
    </div>
</div>

<script>
    $(".confirm").confirm({
        text: "Are you sure?",
        title: "Confirmation required",

        confirm: function(button) {
            var allId = $(button).attr('id');
            var result =allId.split('-')
            var id = result[0];
            var url = result[1];
            var link;
            console.log(id);
            console.log(url);
            if(url=='delete'){
                link = 'http://localhost:8004/Web-Development-Basics-Retake/users/delete/'+id;
            }
            else if(url=='admin'){
                link = 'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeuseradmin/'+id+'/'+1;
            }
            else if(url=='remove'){
                link = 'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeadminuser/'+id+'/'+1;
            }
            $.ajax({
                url:link,
                method:"POST"
            }).always(function() {
                location.reload();
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

