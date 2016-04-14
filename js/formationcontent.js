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
										+"	"+"<button onclick='RemoveChapter("+a.id_chapter+")' type='button' class='btn btn-info btn-xs btn-round' data-toggle='modal' data-target='#myModal3'>"
										+" <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></h3>"
										+"<ul id=chp"+a.id_chapter+" class='chpMenu'></ul>");
		});
	});
}

function ConfirmRemoveChapter()
{

	post = "idChapter=" + $("#idConChpSup").val();


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

function RemoveChapter(idChap)
{
	$("#btnSupCon").click(ConfirmRemoveChapter);
	$("#idConChpSup").val(idChap);
	
}

function RemoveClass(obj)
{
	post = "idClass=" + obj.idClass;
	$.ajax(
	{
		url: '/FaceMOOC/php/controller/RemoveClass.php',
		type: 'POST',
		dataType: 'json',
		data: post,
	}).done(function(data){
		if(data)
		{
			loadClassMenu(obj.idChap);
		}
	});
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

			$(idUL).append("<a onclick='loadClass("+a.id_class+")'><li>"+ a.title +" " 
							+"<button onclick='RemoveClass({idClass:"+a.id_class+ " , idChap:"+ idChap+"})' type='button'  class='btn btn-info btn-xs btn-round' >"
							+"<span class='glyphicon glyphicon-trash' font-size:1em;' aria-hidden='true'></span></button></li></a>");
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