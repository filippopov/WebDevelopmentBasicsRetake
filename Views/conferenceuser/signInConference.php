<?php if($model->error === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You are already sign in for this conference</div>
<?php elseif($model->success === true): ?>
<div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">x</button>
    Successfully sign in for this conference</div>
<?php elseif($model->creatorError === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You are create this conference, you can't sign in</div>
<?php elseif($model->timeCollisionError === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You are sign in for conference in same time (Collision Error). Check your conferences</div>
<?php elseif($model->capacityError === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        Conference is full</div>
<?php endif; ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/jquery-1.7.2.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap.min.js"></script>
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





