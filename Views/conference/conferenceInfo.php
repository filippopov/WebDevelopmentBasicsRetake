<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://raw.githubusercontent.com/myclabs/jquery.confirm/master/jquery.confirm.min.js"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php ///** @var \MVC\ViewModels\ConferenceViewModel $model */?>

<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p>
                <a class="btn btn-success" href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/signinconference/<?=$model[0]->getId()?>">Sign in for the conference</a>
                <a class="btn btn-danger" href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/signoutconference/<?=$model[0]->getId()?>">Sign out for the conference</a>
                <a class="btn btn-info" href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/alluserssigninforthisconference/<?=$model[0]->getId()?>">All users sign in for this conference</a>
                <a class="btn btn-primary" href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
            </p>
            <br/>
            <div class="table-responsive">

<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('class','table table-hover')
    ->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name'])
    ->setContentConferenceOneRow($model[0])
    ->render();

?>

            </div>
        </div>
    </div>
</div>



<div class="row" style="padding: 200px">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <strong>
                        max capacity for this conference:
                    </strong>
                    <span>
                        <?=$model[1]->getCapacity();?>
                    </span>
                </div>
                <div>
                    <strong>
                        sign in users:
                    </strong>
                    <span>
                        <?=$model[2]->getCountUsers() == 0 ? 0 : $model[2]->getCountUsers()?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>





