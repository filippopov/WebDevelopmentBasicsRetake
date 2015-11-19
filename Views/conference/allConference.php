<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php /** @var \MVC\ViewModels\ConferenceViewModel[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/addconference">Add Conference</a>
<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Conference Name','Creator Name','Start Time','End Time','Count of Breaks','Halls Name','Status Name','Delete'])
    ->setContentConference($model)
    ->render();

?>


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
