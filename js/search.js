$("#inputSearch").change(function()
{
	cleanPage();
	loadFormations();
})

function loadFormations(keywords)
{
	$.ajax(
	{
		url: 'php/model/SearchFormations.php',
		type: 'POST',
		dataType: 'json',
		data: $("#frmSearch").serialize(),
	}).done(function(data)
	{
		var sRow = "";
		for(i = 0; i <= data.length -1; i++)
		{
			
			sRow += "<div id='divR"+i+"' class='row'>";
			for(j=1; j<=4; j++)
			{
				sRow +="<a href='Formation/view/" +data[i]['id_formation']+"'>";
				sRow +="<div class ='col-md-3 text-center'>";
				sRow +="<div  class='panel panel-info'>";
				sRow +="<div class='panel-heading'>";
				sRow +="<div class='panel-body'>";
				sRow +="<h2>" + data[i]['title']+ "</h2>";
				sRow +="<img src='" + data[i]['image']+"' alt='Image formation' class='img-responsive img-thumbnail'>";
				sRow +="<p>Difficulty : " +data[i]['difficulty']+" </p>";
				sRow +="<p>Required skills : " + data[i]['required_skill']+ " </p>";
				sRow +="</div>";
				sRow +="</div>";
				sRow +="</div>";
				sRow +="</div>";
				sRow +="</a>";
				
				i++;

				if(i > data.length -1)
				{
					break;
				}

			}
			i--;
			sRow += "</div>";
		}
		$("#divContent").append(sRow);
	})
}

function cleanPage()
{
	$("#divContent").empty();
}