<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p><a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back To Conferences</a></p>
            <br/>
            <div class="table-responsive">
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['User Name','Add as Lector', 'Remove as Lector'])
    ->setContentUsersInConference($model[0])
    ->render();

?>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p>Assistant Lectors For Conference</p>
            <br/>
            <div class="table-responsive">


<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Lectors Name'])
    ->setContentLectors($model[1])
    ->render();

?>
            </div>
        </div>
    </div>
</div>

<div id="content"></div>

<script>
    $('.add').click(function(e){
        var allId = $(this).attr('id');
        var result =allId.split('-')
        var lectorId = result[0];
        var conferenceId = result[1];

        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/lectorconference/addLector/'+lectorId +'/'+conferenceId,
            method:"POST"
        }).done(function(data){
            $('#content').text("Success");
        })
    })
</script>

<script>
    $('.remove').click(function(e){
        var allId = $(this).attr('id');
        var result =allId.split('-')
        var lectorId = result[0];
        var conferenceId = result[1];

        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/lectorconference/removeLector/'+lectorId +'/'+conferenceId,
            method:"POST"
        }).done(function(data){
            $('#content').text("Success");
        })
    })
</script>