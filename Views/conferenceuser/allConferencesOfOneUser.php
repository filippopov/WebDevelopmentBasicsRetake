<?php /** @var \MVC\ViewModels\ConferenceUserViewModel[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
<h3><?=$model[0]->getUserName()?>'s Conferences</h3>
<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
->addAttribute('id', 'names')
->addAttribute('class', 'red-menu')
->addAttribute('border','1px')
->setHeaders(['Conference Name','Start Time','End Time'])
->setContentYourConferences($model)
->render();