$(function(){
	
	$("#redProduct").on("click", function(){
		$.ajax({
			url : "allQuery.php",
			type : "POST",
			data : ({id : $("#idNameProduct").val(), name : $("#redNameProduct").val(), 
					category : $("#redCategoryProduct").val(), cost : $("#redCostProduct").val()}),
			dataType : "html"
		});
	});
	
});

function showRedForm(){
	$(".redButton").on("click", function(){

	});
}