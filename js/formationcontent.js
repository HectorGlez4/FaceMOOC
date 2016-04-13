var idChapter;

$("#addChapter").click(function(event)
{
	event.preventDefault();
	addChapter(idFormation);
});

$("#addClass").click(function(event)
{
	event.preventDefault();
	addClass(idChapter);
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
			$(".ChapterClassMenu").append("<h3><a onclick='loadClassMenu("+a.id_chapter+")'>" +a.title +"</a>"
										+"<button onclick='RemoveChapter("+a.id_chapter+")' type='button' data-toggle='modal' data-target='#myModal3' class='btn btn-primary btn-xs' >"
										+"<span class='glyphicon glyphicon-remove' style='color:red;font-size:1em;' aria-hidden='true'>.</span></button></h3>"
										+"<ul id=chp"+a.id_chapter+" class='chpMenu'></ul>");
		});
	});
}

function RemoveChapter(idChap)
{

	post = "idChapter=" + idChap;
    if (confirm('Are you sure you want to delete this?')) {

	$.ajax(
	{
		url: '/FaceMOOC/php/controller/RemoveChapter.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data){
		if(data)
		{
			loadChapterMenu(idFormation);
		}
	});
}
}

// 






function loadClassMenu(idChap)
{
	$("#hidChapter").val(idChap);
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

function addClass(idClass)
{
	
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/InsertClass.php',
		type: 'POST',
		dataType: 'json',
		data: $("#frmAddClass").serialize(),
	}).done(function(r)
	{
		if(r)
		{
			alert("Class added succesfully");
			loadClassMenu(idClass);
		}
	});
	cleanClassMenu();
	alert(idform);
	loadChapterMenu(idform);
}