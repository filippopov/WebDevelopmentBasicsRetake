<?php if(isset($model->error)): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        An error occurred</div>
<?php elseif(isset($model->success)): ?>
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        Successfully edit Profile
    </div>
<?php endif; ?>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/jquery-1.7.2.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap.min.js"></script>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <h3>Edit Profile</h3>
                </div>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="inputfn3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="username" class="form-control" id="inputfn3" value="<?=$model->getUsername();?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                <input type="password" name="confirm" class="form-control" id="confirmPassword3" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" name="edit" value="Edit"  />
                            <a href="profile" type="button" class="btn btn-success">Back to profile</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

