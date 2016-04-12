<div class="table-responsive">
    <table id="example" class="table" cellspacing="0" width="100%">

        <thead>
        <tr>
            <td>Id Cours</td>
            <td>Titre</td>
            <td>Description</td>
            <td>Compétences requises</td>
            <td>Difficulté</td>
            <td>Mots clés</td>
            <th>Editer</th>
            <th>Modifier</th>
            <th>Supprimer</th>

        </tr>
        </thead>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <br>
            <th>Id Cours</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Compétences requises</th>
            <th>Difficulté</th>
            <th>Mots clés</th>
            <th>Edit</th>
            <th>Modifier</th>
            <th>Supprimer</th>


        </tr>
        </tfoot>
        <tbody>
        <?php

        global $content;

        if (is_array($content['formations']) || is_object($content['formations'])) {

            foreach ($content['formations'] as $key) {

                echo '<tr>';
                echo '<td>' . $key["id_formation"] . '</td>';
                echo '<td>' . $key["title"] . '</td>';
                echo '<td>' . $key["description"] . '</td>';
                echo '<td>' . $key["required_skill"] . '</td>';
                echo '<td>' . $key["difficulty"] . '</td>';
                echo '<td>' . $key["keywords"] . '</td>';

                echo '<td><a href="' . WEBROOT . 'GestionFormation/editFormations/' . $key["id_formation"] . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
                echo '<td><a href="' . WEBROOT . 'GestionFormation/updateFormations/' . $key["id_formation"] . '"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></td>';
                echo '<td><a href="' . WEBROOT . 'GestionFormation/deleteFormations/' . $key["id_formation"] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>';
                echo '</tr>';

            }
        }


        ?>
        </tbody>
    </table>
</div>
<?php include('footer.php') ?>
