$("#inputSearch").keyup(function()
{
	
loadFormations(1);
})

function loadFormations(page)
{
	cleanPage();
	post = $("#frmSearch").serialize();
	if(page)
	{
		post +="&page=" +page;
	}
	else
	{
		post +="&page=1";
	}
	$.ajax(
	{
		url: 'php/controller/SearchFormations.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data)
	{
		var ResultsMax = data[data.length -1];
		data.pop();
		var NbResults = data[data.length - 1];
		data.pop();
		var sRow = "";
		for(i = 0; i <= data.length -1; i++)
		{
			
			sRow += "<div id='divR"+i+"' class='row'>";
			for(j=1; j<=4; j++)
			{
				sRow +="<a href='Formation/view/" +data[i]['id_formation']+"'>";
				sRow +="<div class ='col-md-3 text-center'>";
				sRow +="<div class='panel panel-info well'>";
				sRow +="<div class='panel-heading'>";
				sRow +="<div style='text-overflow: ellipsis; width: 178px;white-space: nowrap;overflow: hidden;' class='panel-body'>";
				sRow +="<p class='panel-title'><b>" +data[i]['title']+ "</b></p>";
				sRow +="</div>";
				sRow +="<img style='height: 150px;width: 200px;' src='" + data[i]['image']+"' alt='Image formation' class='img-responsive img-thumbnail'>";
				sRow +="<p><b>Difficulté : </b>" +data[i]['difficulty']+" </p>";
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
		
		var pages = Math.ceil(NbResults[0] / ResultsMax);
		for (iX =1 ; iX <= pages; iX++)
		{
			sRow += "<a class='btn btn-primary' href='#' role='button' onclick='loadFormations("+iX+")''>"+iX+"</a>";
		}
		$("#divContent").append(sRow);
	})
}

function cleanPage()
{
	$("#divContent").empty();
}
