<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php ///** @var \MVC\ViewModels\ConferenceViewModel $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
->addAttribute('id', 'names')
->addAttribute('class', 'red-menu')
->addAttribute('border','1px')
->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name'])
->setContentConferenceOneRow($model[0])
->render();

?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/signinconference/<?=$model[0]->getId()?>">Sign in for the conference</a>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/signoutconference/<?=$model[0]->getId()?>">Sign out for the conference</a>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/alluserssigninforthisconference/<?=$model[0]->getId()?>">All users sign in for this conference</a>

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



