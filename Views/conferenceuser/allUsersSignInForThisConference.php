<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
<?php



\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['User Name','Add as Lector', 'Remove as Lector'])
    ->setContentUsersInConference($model[0])
    ->render();

?>
<h2>Assistant Lectors For Conference</h2>

<?php
\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Lectors Name'])
    ->setContentLectors($model[1])
    ->render();

?>

<div id="content"></div>

<script>
    $('.add').click(function(e){
        var allId = $(this).attr('id');
        var result =allId.split('-')
        var lectorId = result[0];
        var conferenceId = result[1];

        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/lectorconference/addLector/'+lectorId +'/'+conferenceId,
            method:"POST"
        }).done(function(data){
            $('#content').text("Success");
        })
    })
</script>

<script>
    $('.remove').click(function(e){
        var allId = $(this).attr('id');
        var result =allId.split('-')
        var lectorId = result[0];
        var conferenceId = result[1];

        $.ajax({
            url:'http://localhost:8004/Web-Development-Basics-Retake/lectorconference/removeLector/'+lectorId +'/'+conferenceId,
            method:"POST"
        }).done(function(data){
            $('#content').text("Success");
        })
    })
</script>