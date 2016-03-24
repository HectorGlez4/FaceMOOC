function loadChapterMenu(idform)
{
	cleanChapterMenu();
	post = "idFormation=" + idform;
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/SearchChapters.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data)
	{
		$.each(data, function(index, a)
		{
			$(".ChapterClassMenu").append("<a onclick='loadClassMenu("+a.id_chapter+")''><h3>"+ a.title +"</h3></a><ul id=chp"+a.id_chapter+" class='chpMenu'></ul>");
		});
	});
}

function loadClassMenu(idChap)
{
	cleanClassMenu();
	post = "idChapter=" + idChap;
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/SearchClasses.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data)
	{
		$.each(data, function(index, a)
		{
			idUL = "#chp" + idChap;
			$(idUL).append("<a><li>"+ a.title +"</li></a>");
		});
	});
}

function cleanChapterMenu()
{
	$("#ChapterClassMenu").empty();

}

function cleanClassMenu()
{
	$(".chpMenu").empty();
}
