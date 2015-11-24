<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<?php /** @var \MVC\ViewModels\HallsInformation $model */?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <h3>Add Hall</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="add-hall-name" class="col-sm-2 control-label">Hall Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="add-hall-name" class="form-control" id="add-hall-name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-hall-capacity" class="col-sm-2 control-label">Hall Capacity</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="number" name="add-hall-capacity" class="form-control" id="add-hall-capacity" placeholder="Capacity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" name="add-hall" value="Add-Hall" />
                            <a href="http://localhost:8004/Web-Development-Basics-Retake/halls/allhalls" type="button" class="btn btn-success">Back to Halls</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<?php if($model->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully Add Hall</h2>
<?php endif; ?>