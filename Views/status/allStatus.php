<?php /** @var \MVC\ViewModels\StatusViewModel[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>

<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Status Name'])
    ->setContentStatus($model)
    ->render();
?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/status/addstatus">Add Status</a>