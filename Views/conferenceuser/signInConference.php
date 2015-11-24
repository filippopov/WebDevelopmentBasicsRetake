<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<?php /** @var \MVC\ViewModels\ConferenceUserInformation $model */?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <h3>To sign in four conference click sign in</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-success" name="sign-in" value="Sign-In" id="sign-in"/>
                            <a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference/" type="button" class="btn btn-primary">Back to Conferences</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>





<?php if($model->error === true): ?>
    <h2>You are already sign in for this conference</h2>
<?php elseif($model->success === true): ?>
    <h2>Successfully sign in for this conference</h2>
<?php elseif($model->creatorError === true): ?>
    <h2>You are create this conference, you can't sign in</h2>
<?php elseif($model->timeCollisionError === true): ?>
    <h2>You are sign in for conference in same time (Collision Error). Check your conferences</h2>
<?php elseif($model->capacityError === true): ?>
    <h2>Conference is full</h2>
<?php endif; ?>
