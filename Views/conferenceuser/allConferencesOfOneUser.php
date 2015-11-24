<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<?php /** @var \MVC\ViewModels\ConferenceUserViewModel[] $model */?>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p><strong><?=$model[0]->getUserName()?>'s Conferences</strong></p>
            <p><a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a></p>
            <br/>
            <div class="table-responsive">

<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Conference Name','Start Time','End Time'])
    ->setContentYourConferences($model)
    ->render();
?>

            </div>
        </div>
    </div>
</div>