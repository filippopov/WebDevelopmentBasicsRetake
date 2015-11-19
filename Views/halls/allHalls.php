<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php /** @var \MVC\ViewModels\HallsViewModel[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>

<?php

\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Hall Name','Capacity','Delete'])
    ->setContentHall($model)
    ->render();
?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/halls/addhalls">Add Hall</a>

<script>
    $('a').click(function(e){
        var id = $(this).attr('id')
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/halls/delete/'+id,
            method:"POST"
        }).done(function(data){
            $('tr-'+id).remove();
        })
    })
</script>