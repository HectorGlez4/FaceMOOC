

<!--     <div class="container">
            <div class="row">
                <h3>Liste de Cours</h3>
            </div>
            <div class="row"> -->
                <!-- <table class="table table-striped table-bordered" > -->
          <div class="table-responsive">
           <table id="example" class="table" cellspacing="0" width="100%">

                <thead>
                        <tr>
                        <td>Id Course</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Required Skills</td>
                        <td>Difficulty</td>
                        <td>Keywords</td>
                        <th>Modifier</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      
                    </tr>
                </thead>
                 </tr>
                </thead>
                <tfoot>
                    <tr>
                    <br>
                        <th>Id Course</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Required Skills</th>
                        <th>Difficulty</th>
                        <th>Keywords</th>
                        <th>Modifier</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     
                       
                    </tr>
                </tfoot>
                <tbody>
                <?php
                
                      global $content;
                      if (is_array($content['formations']) || is_object($content['formations'])){
                        
                     

                            foreach ($content['formations'] as $key) {

                                echo '<tr>';
                                echo '<td>' . $key["id_formation"] . '</td>';
                                echo '<td>' . $key["title"] . '</td>';
                                echo '<td>' . $key["description"] . '</td>';
                                echo '<td>' . $key["required_skill"] . '</td>';
                                echo '<td>' . $key["difficulty"] . '</td>';
                                echo '<td>' . $key["keywords"] . '</td>';

                                echo '<td><a href="'.WEBROOT.'GestionFormation/updateFormation/'. $key["id_formation"] .'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
                                echo '<td><a href="'.WEBROOT.'GestionFormation/updateFormation/'. $key["id_formation"] .'"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></td>';
                                echo '<td><a href="'.WEBROOT.'GestionFormation/deleteFormations/'. $key["id_formation"] .'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>';
                                echo '</tr>';
                                
                            }
                            }
         
                        
                    ?>
                </tbody>
            </table>
</div>
                

       
 </body>
        </html>