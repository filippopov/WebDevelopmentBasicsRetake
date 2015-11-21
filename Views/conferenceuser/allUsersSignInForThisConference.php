<?php /** @var \MVC\ViewModels\ConferenceUserViewModel $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['User Name'])
    ->setContentUsersInConference($model)
    ->render();