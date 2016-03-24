			
				 <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modification de mot de passe</h4>
                      </div>
                       
                     
<form name="changePass" action="<?php ROOT ?>Gestion/changepass"  method="post">
            
                    <div class="modal-body">
                            <div class="form-group">
                            <label for="current_password" class="control-label">Mot de passe actuel :</label>
                            <input type="password" class="form-control" placeholder="****" name="password" required autofocus>
                          </div>
                            <div class="form-group">
                            <label for="password">Inserez votre nouveau mot de passe :</label>
                            <input type="password" class="form-control" placeholder="****" name="password_new" required>
                        </div>

                    <div class="form-group">
                         <label for="password">Confirmer votre nouveau mot de passe :</label>
                         <input type="password" class="form-control" placeholder="****" name="password_confirm" required >
                    </div>

                    <button class="btn btn-sm btn-primary btn-block" type="submit">Accepter</button>
          
      </form>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                      </div>
                    </div>  
                   </div>
             </div>
                 
<!--test!-->
