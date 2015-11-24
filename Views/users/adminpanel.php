<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

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
    $('.delete').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/users/delete/'+id,
            method:"POST"
        }).done(function(data){
            $('tr-'+id).remove();
        })
    })
</script>

<script>
    $('.admin-role').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeuseradmin/'+id+'/'+1,
            method:"POST"
        }).done(function(data){
            $('#content').text('This user is now with role admin!')
        })
    })
</script>

<script>
    $('.remove-admin-role').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeadminuser/'+id+'/'+1,
            method:"POST"
        }).done(function(data){
            $('#content').text('This user is now with role user!')
        })
    })
</script>