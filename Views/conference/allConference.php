<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php /** @var \MVC\ViewModels\ConferenceViewModel[] $model */?>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p><a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
            <a class="btn btn-primary" href="http://localhost:8004/Web-Development-Basics-Retake/conference/addconference"><span class="glyphicon glyphicon-plus"></span>Add Conference</a></p>
            <br/>
            <div class="table-responsive">
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name','Delete'])
    ->setContentConference($model)
    ->render();

?>
            </div>
            </div>
            </div>
</div>

<script>
    $('a').click(function(e){
        var id = $(this).attr('id')
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/conference/delete/'+id,
            method:"POST"
        }).done(function(data){
            $('tr-'+id).remove();
        })
    })
</script>
