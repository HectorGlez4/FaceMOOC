<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter un nouveau cours</h4>
            </div>
            <div class="modal-body">
                <form id="frmAddClass" name="addClass" action="<?php ROOT ?>" method="post">
                    <input type="hidden" name="idChapter" id="hidChapter">
                    <div class="form-group">
                        <label for="titleClass" class="control-label">Titre du cours</label>
                        <input type="text" class="form-control" placeholder="Math, Science..." name="titleClass"
                               required autofocus>
                    </div>
                    <button id="addClass" class="btn btn-sm btn-primary btn-block" type="submit" data-dismiss="modal">
                        Ajouter ce cours
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
</div>

<!--test!-->
<div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Supprimer ce chapitre ?</h4>
            </div>
            <div class="modal-body">
                <form id="frmAddClass" name="addClass" action="<?php ROOT ?>" method="post">
                <button class="btn btn-sm btn-primary btn-block" type="button">Oui</button>
                <button type="button" class="btn btn-sm btn-primary btn-block" data-dismiss="modal">Non</button>

                </form>
            </div>
           
        </div>
    </div>
</div>