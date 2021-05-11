$(document).ready(function(){
    $("#clearSearchFields").click(function (){
        $("#contractIdSearch").val("");
        $("#contractorIdSearch").val("");
        $("#contractorNameSearch").val("");
        $("#productIdSearch").val("");
        $("#productNameSearch").val("");
        $("#shopIdSearch").val("");
        $("#shopNameSearch").val("");
        $("#prefectureSearch").val("");
    });
});