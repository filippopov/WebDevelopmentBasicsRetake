<?php /** @var \MVC\ViewModels\StatusViewModel $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/status/allstatus">Back to Halls</a>
<form method="post">
    <div>
        <input type="text" id="edit-status-name" name="edit-status-name" value="<?=$model->getName()?>"/>
        <button id="edit-status" name="edit-status" value="edit-status">Edit Status Name</button>
    </div>
</form>