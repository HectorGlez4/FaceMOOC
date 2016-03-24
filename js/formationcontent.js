function loadChapterClassMenu()
{
	cleanChapterClassMenu();
	post = "idFormation=" + idFormation;
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/SearchChapters.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data)
	{
		alert(data);
		$.each(data, function(index, a)
		{
			alert(a.title);
			$(".ChapterClassMenu").append("<a><h3>"+ a.title +"</h3></a>");
		});
	});
}

function cleanChapterClassMenu()
{
	$("#ChapterClassMenu").empty();

}