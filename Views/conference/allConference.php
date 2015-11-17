<?php /** @var \MVC\ViewModels\ConferenceViewModel[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/addconference">Add Conference</a>
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name'])
    ->setContentConference($model)
    ->render();

?>



