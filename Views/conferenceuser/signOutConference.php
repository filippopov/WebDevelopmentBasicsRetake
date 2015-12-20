<?php if($model->error === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You aren't sign in for this conference</div>
<?php elseif($model->success === true): ?>
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        Successfully sign out for this conference
    </div>
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
                    <h3>To sign out four conference click sign out</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-danger" name="sign-out" value="Sign-Out" id="sign-out"/>
                            <a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference/" type="button" class="btn btn-success">Back to Conferences</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
