<?php /** @var \MVC\ViewModels\ConferenceUserInformation $model */?>
    <a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference/">Back to Conferences</a>
    <div>To sign out four conference click sign out</div>
    <form method="post">
        <button id="sign-out" name="sign-out" value="sign-out">Sign Out</button>
    </form>


<?php if($model->error === true): ?>
    <h2>You aren't sign in for this conference</h2>
<?php elseif($model->success === true): ?>
    <h2>Successfully sign out for this conference</h2>
<?php endif; ?>