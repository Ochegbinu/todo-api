$(document).ready(function () {
    $("#state").change(function () {
        var a = $(this).val();
        $("#local_government").find("td").not(":first").remove();
            $.ajax({
                url: "../select-local-government/" + a,
                type: "get",
                dataType: "json",
                success: function (a) {
                    var n = 0;
                    var table = $('#myTable').DataTable();
                    table.clear();
                    if ((null != a.data && (n = a.data.length), n > 0))
                    
                    for (var t = 0; t < n; t++) {
                        table.rows.add( [ {
                            "S/N":  (t+1),
                            "Name": a.data[t].name,
                            "Head Qtr":a.data[t].headquarter, 
                            "Council Wards": a.data[t].total_wards,
                            "Date": a.data[t].created_at,
                            "Edit": "<a href='../admin/local-governments/edit/" + a.data[t].uuid + "' class='btn btn-success btn-sm' target='_blank'> Edit <i class='fas fa-pen'></i></a>"
                        } ] )
                        .draw();
                    }

                },
            });
    });
}); 
