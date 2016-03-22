<?php 
 include("head.php");
include("header.php");
?>

<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/tableformations.js"></script>

<body>


<div class="container">
    <div class="jumbotron">
        <h1>Formation Manager</h1>
    </div>
   
                

            <form  action="<?php ROOT ?>GestionFormation/gestionfor" method="POST"  enctype="multipart/form-data">
        <h3>Add a new course</h3>

                <div class="cont">
                        <div class="form-group">
                            <label for="titlef">Title :</label>
                            <input type="text" class="form-control" name="titlef">
                            </div>

                            <div class="form-group">
                            <label for="diff">Difficulty :</label><br>
                            <select name="diff">
                            <option value="">Select an option</option>
                              <option value="Easy">Easy</option>
                              <option value="Normal">Normal</option>
                              <option value="Intermediate">Intermediate</option>
                              <option value="Advanced">Advanced</option>
                            </select>

                             </div>
                          <div class="form-group">
                    <label for="im">Image :</label>
                        <input type="file" name="imag"/>

                        </div>
              
                          <div class="form-group">
                            <label for="requireskill">Required skills :</label>
                            <textarea rows="4" cols="50" class="form-control" name="requireskill"></textarea>    
                            </div>

                            <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea rows="4" cols="50" class="form-control" name="description" ></textarea>   
                            </div>

                              <div class="form-group">
                            <label for="keywords">Keywords :</label>
                            <input type="text" class="form-control" name="keywords">
                            </div>
                <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-md btn-primary btn-block" type="submit">Save Formation</button>
                  </div>
                  <div class="col-md-6">
                <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>Home'>Cancel</a>

                  </div>
                </div>
        </div>
        </form>
  
    <?php include("cours.php") ?>

</div>

  </div>
</div>
  

</body>