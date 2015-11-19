<?php /** @var \MVC\ViewModels\HallsViewModel $model */?>
<a href="http://localhost:8004/Web-Development-Basics-Retake/halls/allhalls">Back to Halls</a>
<form method="post">
    <div>
        <input type="text" id="edit-hall-name" name="edit-hall-name" value="<?=$model->getName()?>"/>
        <input type="number" id="edit-hall-capacity" name="edit-hall-capacity" value="<?=$model->getCapacity()?>"/>
        <button id="edit-hall" name="edit-hall" value="edit-hall">Edit Hall</button>
    </div>
</form>


