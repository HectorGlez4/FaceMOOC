<?php include("head.php") ?>


<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">

<body>


<div class="container">
    <div class="jumbotron">
        <h1>Formation Manager</h1>
    </div>


            <form  action="<?php ROOT ?>Gestion/gestionfor" method="POST role="form">

                <div class="cont">
                        <div class="form-group">
                            <label for="titlef">Title :</label>
                            <input type="text" class="form-control" name="titlef">
                            </div>
<div class="form-group">
<label for="diff">Difficulty :</label><br>
<select>
  <option value="Easy">Easy</option>
  <option value="Normal">Normal</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Advanced">Advanced</option>
</select>
 </div>



                          <div class="form-group">
                            <label for="requireskill">Required skills :</label>
                            <textarea rows="4" cols="50" class="form-control" name="requireskill"> 
                            </textarea>    
                            </div>

                            <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea rows="4" cols="50" class="form-control" name="description" > 
                            </textarea>   
                            </div>


                <button class="btn btn-md btn-primary btn-block" type="submit">Save Formation</button>

        </div>
        </form>


    </div>
</div>
</body>