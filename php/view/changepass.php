<?php 
include("head.php");
?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
<body>				
				 <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modification de mot de passe</h4>
                      </div>
                        <div class="modal-body">
                        <form class="login" action="<?php WEBROOT ?>User/changepass" method="POST">
                            <div class="form-group">
                            <label for="password">Inserez votre nouveau mot de passe :</label>
                            <input type="password" class="form-control" placeholder="****" name="password" required autofocus>
                        </div>

                    <div class="form-group">
                         <label for="password">Confirmer :</label>
                         <input type="password" class="form-control" placeholder="****" name="password" required autofocus>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Accepter</button>
            

                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>  
                   </div>
                 </div>
<!--test!-->

<?php global $content ?>

</body>
</html>
<!-- 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>  
   </div>
 </div>
    -->