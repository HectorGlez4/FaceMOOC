

     </head>
    <body>

    <div class="container">
            <div class="row">
                <h3>Liste de Cours</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered" >
            <!-- <table cellpadding="0" cellspacing="0" border="0" class="display" id="listformations"> -->

                <thead>
                    <tr>
                        <td>Id Course</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Required Skills</td>
                        <td>Difficulty</td>
                        <td>Keywords</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                      global $content;
                          var_dump($content['formations']);
                            foreach ($content['formations'] as $key) {

                                echo '<tr>';
                                echo '<td>' . $key["id_formation"] . '</td>';
                                echo '<td>' . $key["title"] . '</td>';
                                echo '<td>' . $key["description"] . '</td>';
                                echo '<td>' . $key["required_skill"] . '</td>';
                                echo '<td>' . $key["difficulty"] . '</td>';
                                echo '<td>' . $key["keywords"] . '</td>';



                                echo '<td><a href="<?php WEBROOT ?>GestionFormation/updateFormation?id_formation='. $key["id_formation"] .'"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></td>';
                                echo '<td><a href="'.WEBROOT.'GestionFormation/deleteFormations/'. $key["id_formation"] .'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>';
                                echo '</tr>';
                            }
                           
         
                        
                    ?>
                </tbody>
            </table>

                

       
 </body>
        </html>