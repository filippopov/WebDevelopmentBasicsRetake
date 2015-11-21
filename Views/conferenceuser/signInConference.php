<?php /** @var \MVC\ViewModels\ConferenceUserInformation $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference/">Back to Conferences</a>
<div>To sign in four conference click sign in</div>
<form method="post">
    <button id="sign-in" name="sign-in" value="sign-in">Sign In</button>
</form>


<?php if($model->error === true): ?>
    <h2>You are already sign in for this conference</h2>
<?php elseif($model->success === true): ?>
    <h2>Successfully sign in for this conference</h2>
<?php elseif($model->creatorError === true): ?>
    <h2>You are create this conference, you can't sign in</h2>
<?php elseif($model->timeCollisionError === true): ?>
    <h2>You are sign in for conference in same time (Collision Error). Check your conferences</h2>
<?php endif; ?>
