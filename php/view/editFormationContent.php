<?php
include("head.php");
include("header.php");
global $content;
?>
<div class='container'>
    <div class="jumbotron">
        <h1><?php echo $content['FormationInfo'][0]['title']; ?></h1>
    </div>

    <div class='row'>
        <div class='col-md-3'>
            <td><a href=""><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Chapter </a></td>
            <td><a href=""><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Class</a></td>
        </div>
        <div class='col-md-9'>
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" class="form-control" name="title" />
            </div>
            <div class="form-group">
                <label for="desc">Description :</label><textarea rows="4" cols="50" class="form-control" name="description" ></textarea>
            </div>
            <div class="form-group">
                <label for="video">Video :</label>
                VIDEO
                <input type="url" class="form-control" name="video" placeholder="http://"/>
            </div>
            <label for="videoClass">
                Cours :
            </label>
            COURS
            <div class="form-group">
                <div class="input-group">
                    <input type="file" name="videoClass"/>
                </div>
            </div>
        </div>
    </div>

</div>