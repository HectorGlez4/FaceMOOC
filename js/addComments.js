$(document).ready(function(){
 
                    function showComment(id){
                    	post = "idFormation=" + id;

                      $.ajax({
                        type:"post",
                        url:"/FaceMOOC/php/controller/searchComments.php",
                        data: post,
                        success:function(data){
                             $("#comments").html(data);
                        }
                      });
                    }
 
                    showComment(id);

            $("#frmaddComment").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/FaceMOOC/php/controller/Comments.php",
                    data: $(this).serialize(),
                    success: function(data) {
                        // $("#comments").append(data+"<p>esto viene desde el ajax</p>");//instead this line here you can call some function to read database values and display
                     showComment(id);
                    },
                });
            });
            });









































// $("#btnc").click(function(event)
// {
// 	event.preventDefault();
// 	addComment(idFormation);
// });

// function seeComment(idform)
// {
	
// 	// clean();
	
// 	post = "idFormation=" + idform;
// 	$.ajax(
// 	{
// 		url: '/FaceMOOC/php/controller/searchComments.php',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: post,
// 	}).done(function(data)
// 	{
// 		alert("aa");
// 		$.each(data, function(index, a)
// 		{
// 			$("#comments").append("<p>"+ a.description +"</p>");
// 		});
// 	});
// }

// function addComment(id)
// {
// 	alert('dddd');

// 	$.ajax(
// 	{
// 		url: '/FaceMOOC/php/controller/Comments.php',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: $("#frmaddComment").serialize(),
// 	}).done(function(r)
// 	{
// 		if(r)
// 		{
// 			alert("succes");
// 		seeComment(id);

// 		}
// 	});
// 		alert(idform);
// 	 seeComment(idform);
// }


