<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
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


<?php if($model->error === true): ?>
    <h2>You aren't sign in for this conference</h2>
<?php elseif($model->success === true): ?>
    <h2>Successfully sign out for this conference</h2>
<?php endif; ?>