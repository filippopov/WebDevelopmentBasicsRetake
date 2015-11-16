<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php /** @var \MVC\ViewModels\User[] $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Profile</a>
<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Name','Delete'])
    ->setContent($model)
    ->render();

?>

<script>
    $('a').click(function(e){
        var id = $(this).attr('id')
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/users/delete/'+id,
            method:"POST"
        }).done(function(data){
            $('tr-'+id).remove();
        })
    })
</script>