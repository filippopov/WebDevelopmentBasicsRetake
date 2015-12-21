<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>

<script src="https://rawgit.com/myclabs/jquery.confirm/master/jquery.confirm.js"></script>





<div class="container">
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <br/>
            <p><a class="btn btn-success"href="http://localhost:8004/Web-Development-Basics-Retake/users/profile">Back To Profile</a>
                <a class="btn btn-primary" href="http://localhost:8004/Web-Development-Basics-Retake/comments/addcomment"><span class="glyphicon glyphicon-plus"></span>Add Comment</a></p>
            <br/>
            <div class="table-responsive">
            <?php foreach($model[0] as $comment ):?>
                <table class="table table-hover" style="border: 1px solid black"id="table-<?=$comment->getId();?>">
                    <tr>
                        <td>Author: <?=$comment->getAuthorName();?></td>
                        <td><?=$comment->getDateTime();?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?=$comment->getComment();?>
                        </td>
                    </tr>
                    <tr>
                        <?php if($_SESSION['id']==$comment->getUserId()):?>
                            <td><a href="" class="confirm btn btn-danger" id="<?=$comment->getId();?>">Delete Comment</a></td>
                            <td><a href="http://localhost:8004/Web-Development-Basics-Retake/comments/editcomment/<?=$comment->getId();?>" class="btn btn-info">Edit Comment</a></td>
                        <?php elseif($_SESSION['id']!=$comment->getUserId()): ?>
                            <td colspan="2">You can't delete or edit foreign comment</td>
                        <?php endif; ?>
                    </tr>
                </table>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <ul class="pagination">
<?php for($i=1;$i<=$model[1];$i++):?>
    <?php $value = $i-1;?>
    <li><a href="http://localhost:8004/Web-Development-Basics-Retake/comments/allcomments/<?=$value?>"><?=$i?></a></li>
<?php endfor ?>
    </ul>
</div>
<script>
    $(".confirm").confirm({
        text: "Are you sure you want to delete that comment?",
        title: "Confirmation required",

        confirm: function(button) {
            var id = $(button).attr('id');
            $.ajax({
                url:'http://localhost:8004/Web-Development-Basics-Retake/comments/deletecomment/'+id,
                method:"POST"
            }).always(function() {
                $('#table-'+id).remove();
            });
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes I am",
        cancelButton: "No",
        post: true,
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });
</script>
