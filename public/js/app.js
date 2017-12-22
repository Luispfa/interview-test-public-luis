$(document).ready(function () {
    
    
    $("form").submit(function (e) {
        e.preventDefault();
        $("#tblProd tbody").empty();
        $("#tblProd").addClass('hidden');
        $(".alert").addClass('hidden');
        var $reference = $("input[type='text']").val();
        $.ajax({
            type: "GET",
            url: this.action,
            data: {reference: $reference},
            cache: false,
            success: function ($data) {
                var $obj = $.parseJSON($data);
                console.log($obj)
                if ($obj.reference != "") {
                    $("#tblProd").removeClass('hidden');
                    var $newRowContent = "<tr><td>" + $obj.reference + "</td><td>" + $obj.name + "</td><td>" + $obj.bestPrice + "</td><td>" + $obj.bestPriceShopName + "</td><td>" + $obj.saving + "</td></tr>";
                    $("#tblProd tbody").append($newRowContent);
                }else{
                    $(".alert").removeClass('hidden');
                }
            },
            error: function ($request, $status, $error) {

            }
        });
    });
});