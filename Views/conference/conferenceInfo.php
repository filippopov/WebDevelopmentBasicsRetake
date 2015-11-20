<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php /** @var \MVC\ViewModels\ConferenceViewModel $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
->addAttribute('id', 'names')
->addAttribute('class', 'red-menu')
->addAttribute('border','1px')
->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name'])
->setContentConferenceOneRow($model)
->render();

?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/signinconference/<?=$model->getId()?>">Sign in for the course</a>
<a href="">Sign out for the course</a>


