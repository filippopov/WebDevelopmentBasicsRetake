<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/conferenceinfo/<?=$model[2]->getId()?>">Back to Conference Information</a>
<div class="container">
    <form method="post">
        <div>
            <label for="conference-name">Conference Name</label><br/>
            <input type="text" name="conference-name-edit" id="conference-name" value="<?=$model[2]->getName()?>"/><br/>
            <label for="conference-breaks">Count of breaks</label><br/>
            <input type="number" name="conference-breaks-edit" id="conference-breaks" value="<?=$model[2]->getNumberOfBreaks()?>"/><br/>
            <label for="conference-start">Conference Start</label>
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
            <label for="conference-end">Conference End</label>
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


            <label for="hall-name">Hall Name</label><br/>
            <select id="hall-name" name="hall-name-edit" >
                <?php foreach($model[0] as $value):?>
                    <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
                <?php endforeach ?>
            </select><br/>
            <label for="status-conference">Status Conference</label><br/>
            <select id="status-conference" name="status-conference-edit">
                <?php foreach($model[1] as $value):?>
                    <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
                <?php endforeach ?>
            </select><br/>
            <button id="edit-conference" name="edit-conference" value="edit-conference">Edit Conference</button>
        </div>
    </form>
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

<?php if($model[3]->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif($model[3]->success === true): ?>
    <h2>Successfully Edit Conference</h2>
<?php elseif($model[3]->currentTimeError === true): ?>
    <h2>You can't edit this conference because start time is before current time</h2>
<?php elseif($model[3]->timeError === true): ?>
    <h2>You can't add this conference because end time is before start time</h2>
<?php endif; ?>

