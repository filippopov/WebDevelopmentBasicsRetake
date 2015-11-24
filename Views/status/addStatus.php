<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<?php /** @var \MVC\ViewModels\StatusInformation $model */?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <h3>Add Status</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="add-status-name" class="col-sm-2 control-label">Add Status</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="add-status-name" class="form-control" id="add-status-name" placeholder="Status Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" name="add-status" value="Add-Status" />
                            <a href="http://localhost:8004/Web-Development-Basics-Retake/status/allstatus" type="button" class="btn btn-success">Back to Status</a>
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