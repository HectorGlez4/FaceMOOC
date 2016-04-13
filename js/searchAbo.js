$("#inputSearch").keyup(function () {

    loadFormations(1);
})

function loadFormations(page) {
    cleanPage();
    post = $("#frmSearch").serialize();
    if (page) {
        post += "&page=" + page;
    }
    else {
        post += "&page=1";
    }
    post += "&idUser=" + idEmail;
    $.ajax(
        {
            url: '/FaceMOOC/php/controller/SearchAbonnements.php',
            type: 'POST',
            dataType: 'json',
            data: post,
        }).done(function (data) {
        var ResultsMax = data[data.length - 1];
        //alert(ResultsMax);
        //var NbResults = data[data.length - 1];
        var NbResults = data[data.length - 1];
        //alert(data[data.length - 1]);
        //alert(NbResults[0]);
        //alert(data.join(""));
        var sRow = "";
        for (i = 0; i <= data.length - 1; i++) {

            sRow += "<div id='divR" + i + "' class='row'>";
            for (j = 1; j <= 4; j++) {
                sRow += "<a href='Formation/view/" + data[i]['id_formation'] + "'>";
                sRow += "<div class ='col-md-3 text-center'>";
                sRow += "<div class='panel panel-info well' style=''>";
                sRow += "<div class='panel-heading'>";
                sRow += "<div class='panel-body'>";
                sRow += "<p style='text-overflow: ellipsis; width: 200px;white-space: nowrap;overflow: hidden;' class='panel-title'><b>" + data[i]['title'] + "</b></p>";
                sRow += "</div>";
                sRow += "<img style='height: 150px;width: 200px;' src='" + data[i]['image'] + "' alt='Image formation' class='img-responsive img-thumbnail'>";
                sRow += "<p><b>Difficulté : </b>" + data[i]['difficulty'] + " </p>";
                sRow += "</div>";
                sRow += "</div>";
                sRow += "</div>";

                sRow += "</a>";

                i++;

                if (i > data.length - 1) {
                    break;
                }

            }
            i--;
            sRow += "</div>";
        }

        var pages = Math.ceil(NbResults[0] / ResultsMax);
        for (iX = 1; iX <= pages; iX++) {
            sRow += "<a class='btn btn-primary' href='#' role='button' onclick='loadFormations(" + iX + ")''>" + iX + "</a>";
        }
        $("#divContent").append(sRow);
    });
}

function cleanPage() {
    $("#divContent").empty();
}
