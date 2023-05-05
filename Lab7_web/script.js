$(document).ready(function(){
	$("table").on('click', '.btnDelete', function(){
		var result = confirm("Are you sure to delete?");
    	if(result){
        	let bid = $(this).closest('tr')[0].cells[0].innerText;
			$.post("delete.php",{'bid':bid});
			$(this).closest('tr').remove();
    	}
	});

	$("table").on('click', '.btnUpdate', function(){
		let tableId = $(this).closest('tr')[0].cells[0].innerText;
		let tableTitle = $(this).closest('tr')[0].cells[1].innerText;
		let tableAuthor = $(this).closest('tr')[0].cells[2].innerText;
		let tableNrPages = $(this).closest('tr')[0].cells[3].innerText;
		let tableGenre = $(this).closest('tr')[0].cells[4].innerText;
		let tableBorrowed = $(this).closest('tr')[0].cells[5].innerText;
		$(".update_form #id").val(tableId);
        $(".update_form #location_name").val(tableTitle);
        $(".update_form #country_name").val(tableAuthor);
        $(".update_form #description").val(tableNrPages);
        $(".update_form #tourist_targets").val(tableGenre);
        $(".update_form #estimated_cost").val(tableBorrowed);
        if($(".update_form").css("display") === "none")
            $(".update_form").css("display", "inline");
        else
            $(".update_form").css("display", "none");
	});
});