<!DOCTYPE html>
<html>
<head>
    <title>TEST PAGE</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$(".calcell").click(function(){
		var val=$(this).attr("id");
		var date = val.split('-');
		var year = date[0];
		var month = date[1];
		var day = date[2];
		var title = prompt('Event Title:');
		$.ajax({
			url : 'add-event.php',
			type : 'POST',
			data :{year:date[0],month:date[1],day:date[2],title:title},
			success : function(data){
				if(data == 1){
					location.reload();
				} else if(data == 0) {
					alert('등록에 실패했습니다.');
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("arjax error : " + textStatus + "\n" + errorThrown);
			}
		});
	});

    $(".num").click(function(e){
		var val=$(this).attr("uid");
		var deleteMsg = confirm("정말 삭제하시겠습니까?");
		if(deleteMsg){
			$.ajax({
				url : 'delete-event.php',
				type : 'POST',
				data :{id:val},
				success: function (data) {
					if(data == 1){
						location.reload();
					} else if(data == 0) {
						alert('삭제에 실패했습니다.');
					}
				}
			});
		}
	});
});
</script>
</head>
<body>
<?php
    echo date('y-m-d', mktime(0,0,0,11,1,2019));
    echo "<br>";
    echo mktime(0,0,0,11,1,2019);

?>
</body>
</html>
