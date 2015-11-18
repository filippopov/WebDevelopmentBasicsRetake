<?php /** @var \MVC\ViewModels\StatusInformation $model */?>
    <a href="http://localhost:8004/Web-Development-Basics-Retake/status/allstatus">Back to Status</a>
    <form method="post">
        <div>
            <input type="text" id="add-status-name" name="add-status-name" placeholder="Status Name"/>
            <button id="add-hall" name="add-status" value="add-status">Add Status</button>
        </div>
    </form>

<?php if($model->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully Add Hall</h2>
<?php endif; ?>