<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
<a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Back to Conferences</a>
<div class="container">
    <form method="post">
    <div>
        <label for="conference-name">Conference Name</label><br/>
        <input type="text" name="conference-name" id="conference-name" placeholder="Conference Name"/><br/>
        <label for="conference-breaks">Count of breaks</label><br/>
        <input type="number" name="conference-breaks" id="conference-breaks" placeholder="Conference Breaks"/><br/>
        <label for="conference-start">Conference Start</label>
        <div class="row">
            <div class='col-sm-4'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" id="conference-start" name="conference-start"/>
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
                        <input type='text' class="form-control" id="conference-end" name="conference-end"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
        </div>


        <label for="hall-name">Hall Name</label><br/>
        <select id="hall-name" name="hall-name">
            <?php foreach($model[0] as $value):?>
            <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
            <?php endforeach ?>
        </select><br/>
        <label for="status-conference">Status Conference</label><br/>
        <select id="status-conference" name="status-conference">
            <?php foreach($model[1] as $value):?>
                <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
            <?php endforeach ?>
        </select><br/>
        <button id="add-conference" name="add-conference" value="add-conference">Add Conference</button>
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

<?php if($model[2]->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif($model[2]->success === true): ?>
    <h2>Successfully Add Conference</h2>
<?php elseif($model[2]->currentTimeError === true): ?>
    <h2>You can't add this conference because start time is before current time</h2>
<?php elseif($model[2]->timeError === true): ?>
    <h2>You can't add this conference because end time is before start time</h2>
<?php endif; ?>