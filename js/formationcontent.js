$("#addChapter").click(function(event)
{
	event.preventDefault();
	addChapter(idFormation);
});

$("#addClass").click(function(event)
{
	event.preventDefault();
	addClass();
});

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
			$(idUL).append("<a onclick='loadClass("+a.id_class+")'><li>"+ a.title +"</li></a>");
		});
	});
}

function loadClass(idClass)
{
	post = "idClass=" + idClass;
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/SelectClass.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data)
	{
		$.each(data, function(index, a)
		{
			$("#iclTitle").val(a.title);
			$("#iclDescription").val(a.description);
			$("#iclVideo").val(a.video);
			$("#iclID").val(a.id_class);
		});
	});
}

function cleanChapterMenu()
{
	$(".ChapterClassMenu").empty();

}

function cleanClassMenu()
{

	$(".chpMenu").empty();
}

function addChapter(idInsert)
{
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/InsertChapter.php',
		type: 'POST',
		dataType: 'json',
		data: $("#frmAddChapter").serialize(),
	}).done(function(r)
	{
		if(r)
		{
			alert("Chapter added succesfully");
			loadChapterMenu(idInsert);
		}
	});
	cleanClassMenu();
	alert(idform);
	loadChapterMenu(idform);
}

function addClass(idInsert)
{
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/InsertChapter.php',
		type: 'POST',
		dataType: 'json',
		data: $("#frmAddChapter").serialize(),
	}).done(function(r)
	{
		if(r)
		{
			alert("Chapter added succesfully");
			loadChapterMenu(idInsert);
		}
	});
	cleanClassMenu();
	alert(idform);
	loadChapterMenu(idform);
}