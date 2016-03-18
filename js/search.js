$("#inputSearch").change(function()
{
	cleanPage();
	loadFormations();
})

function loadFormations(keywords)
{
	$.ajax(
		url: '../php/model/SearchFormations.php',
		type: 'POST',
		datatype: 'json',
		data: $("#frmSearch").serialize(),
	)
}

function cleanPage()
{
	$("#content").html("");
}