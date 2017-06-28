$(function () {
    $('#save').click(function () {
        
        var datas = [];
        $(".states").each(function () {

            var checked = $(this).prop('checked');
            var pid = $(this).val();
            var lbid = $(this).attr('data-id');
            var status = 0;
            
            if(checked)
                status = 1;
                
            console.log(pid);
            console.log(checked);
            
            datas.push( {id: pid, lid: lbid, status: status} );
        });

        console.log(datas);
        $.ajax({
            type: "POST",
            url: "../bestellschein/a_update.php",
            data: {datas: datas},
            success: function (data) {
                console.log(data);
                window.location.reload();
            }
        });

        //$('#detailModal').modal('hide');
    });
});

$(function () {
    $(".announce").click(function () {
        $("#aname").text("Details zu Auftrag Nr #" + $(this).data('id'));

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "../bestellschein/a_detail.php",
            data: {id: id},
            success: function (data) {
                $(".records_content").html(data);
            }
        });
    });
});


