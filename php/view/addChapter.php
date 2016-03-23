<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adding a new Chapter</h4>
            </div>


            <form action="../addChapter/<?php echo $content['FormationInfo'][0]['id_formation'] ?>" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameChapter" class="control-label">Chapter name</label>
                        <input type="text" class="form-control" placeholder="Chapter" name="nameChapter" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="descriptionChapter">Description Chapter :</label><textarea rows="4" cols="50" class="form-control" name="descriptionChapter" required></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block" type="submit">Add Chapter</button>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>

<!--test!-->
