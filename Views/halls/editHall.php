<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<?php /** @var \MVC\ViewModels\HallsViewModel $model */?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <h3>Edit Hall</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="edit-hall-name" class="col-sm-2 control-label">Hall Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="edit-hall-name" class="form-control" id="edit-hall-name" value="<?=$model->getName()?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-hall-capacity" class="col-sm-2 control-label">Hall Capacity</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="number" name="edit-hall-capacity" class="form-control" id="edit-hall-capacity" value="<?=$model->getCapacity()?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" id="edit-hall" name="edit-hall" value="Edit-Hall" />
                            <a href="http://localhost:8004/Web-Development-Basics-Retake/halls/allhalls" type="button" class="btn btn-success">Back to Halls</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>