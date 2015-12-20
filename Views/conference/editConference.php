<?php if($model[3]->error === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        An error occurred</div>
<?php elseif($model[3]->success === true): ?>
    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        Successfully Edit Conference
    </div>
<?php elseif($model[3]->currentTimeError === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You can't edit this conference because start time is before current time</div>
<?php elseif($model[3]->timeError === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        You can't edit this conference because end time is before start time</div>
<?php endif; ?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header" style="margin-top:5px;">
                        <h3>Edit Conference</h3>
                    </div>
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label for="conference-name" class="col-sm-2 control-label">Conference Name</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="conference-name-edit" class="form-control" id="conference-name" value="<?=$model[2]->getName()?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="conference-breaks" class="col-sm-2 control-label">Conference Breaks</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="number" name="conference-breaks-edit" class="form-control" id="conference-breaks" value="<?=$model[2]->getNumberOfBreaks()?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="conference-start" class="col-sm-2 control-label">Conference Start</label>
                            <div class="row">
                                <div class='col-sm-4'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" id="conference-start" name="conference-start-edit"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="conference-end" class="col-sm-2 control-label">Conference End</label>
                            <div class="row">
                                <div class='col-sm-4'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' class="form-control" id="conference-end" name="conference-end-edit"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hall-name" class="col-sm-2 control-label">Hall Name</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="hall-name" name="hall-name-edit" >
                                        <?php foreach($model[0] as $value):?>
                                            <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status-conference" class="col-sm-2 control-label">Status Conference</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="status-conference" name="status-conference-edit">
                                        <?php foreach($model[1] as $value):?>
                                            <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" name="edit-conference" value="Edit-Conference" id="edit-conference" />
                                <a href="http://localhost:8004/Web-Development-Basics-Retake/conference/conferenceinfo/<?=$model[2]->getId()?>" type="button" class="btn btn-success">Back to Conference Information</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/moment/moment/develop/moment.js"></script>
    <script src="https://cdn.rawgit.com/moment/moment/master/locale/en-au.js"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss'
            });
        });
        $(function() {
            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss'
            });
        });
    </script>
</div>





