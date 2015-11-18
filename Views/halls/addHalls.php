<?php /** @var \MVC\ViewModels\HallsInformation $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/halls/allhalls">Back to Halls</a>
<form method="post">
    <div>
        <input type="text" id="add-hall-name" name="add-hall-name" placeholder="Name"/>
        <input type="number" id="add-hall-capacity" name="add-hall-capacity" placeholder="Capacity"/>
        <button id="add-hall" name="add-hall" value="add-hall">Add Hall</button>
    </div>
</form>

<?php if($model->error === true): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully Add Hall</h2>
<?php endif; ?>