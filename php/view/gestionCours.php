<?php include("head.php") ?>


<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">

<body>


<div class="container">
    <div class="jumbotron">
        <h1>Formation Manager</h1>
    </div>


            <form  action="<?php ROOT ?>GestionFormation/gestionfor" method="POST">
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
                            <label for="image">Image :</label>
                             <input type="file" name="image">

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

                              <div class="form-group">
                            <label for="keywords">Keywords :</label>
                            <input type="text" class="form-control" name="keywords">
                            </div>
                <button class="btn btn-md btn-primary btn-block" type="submit">Save Formation</button>

        </div>
        </form>


    </div>
</div>
</body>