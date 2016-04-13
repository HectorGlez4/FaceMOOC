<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter un nouveau chapitre</h4>
            </div>

            <form action="" method="post" id="frmAddChapter">
                <input type="hidden" name="idFormation" value="<?php echo $idForm ?>">

                <div class="modal-body">
                    <div class="form-group">

                        <label for="nameChapter" class="control-label">Nom du chapitre</label>
                        <input type="text" class="form-control" placeholder="Chapter" name="nameChapter" required
                               autofocus>
                    </div>
                    <div class="form-group">
                        <label for="descriptionChapter">Description du chapitre</label><textarea rows="4" cols="50"
                                                                                                 class="form-control"
                                                                                                 name="descriptionChapter"
                                                                                                 required></textarea>
                    </div>
                    <button id="addChapter" class="btn btn-sm btn-primary btn-block" type="submit"  data-dismiss="modal" aria-label="Close">Add Chapter</button>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
        </div>
  </form>
  <span></span>
         <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                      </div>
    </div>
</div>




