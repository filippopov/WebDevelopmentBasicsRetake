<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<a href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Profile</a>
<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Name','Delete','Admin Role','Remove Admin Role'])
    ->setContentUser($model[0])
    ->render();

?>
<div id="content"></div>

<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['AdminNames'])
    ->setContentAdmins($model[1])
    ->render();

?>

<script>
    $('.delete').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/users/delete/'+id,
            method:"POST"
        }).done(function(data){
            $('tr-'+id).remove();
        })
    })
</script>

<script>
    $('.admin-role').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeuseradmin/'+id+'/'+1,
            method:"POST"
        }).done(function(data){
            $('#content').text('This user is now with role admin!')
        })
    })
</script>

<script>
    $('.remove-admin-role').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/roleuser/makeadminuser/'+id+'/'+1,
            method:"POST"
        }).done(function(data){
            $('#content').text('This user is now with role user!')
        })
    })
</script>