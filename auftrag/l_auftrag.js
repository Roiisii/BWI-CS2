$(function () {
    $('#save').click(function () {
        
        var datas = [];
        $(".states").each(function () {

            var checked = $(this).prop('checked');
            var pid = $(this).val();
            var kbid = $(this).attr('data-id');
            var status = 0;
            
            if(checked)
                status = 1;
            
            console.log(pid);
            console.log(checked);
            
            datas.push( {id: pid, kid: kbid, status: status} );
        });

        console.log(datas);
        $.ajax({
            type: "POST",
            url: "../auftrag/a_auftrag_update.php",
            data: {datas: datas},
            success: function (data) {
                console.log(data);
                window.location.reload();
            }
        });

        //$('#detailModal').modal('hide');
        //window.location.reload();
    });
});

$(function () {
    $(".announce").click(function () {
        $("#aname").text("Details zu Auftrag Nr #" + $(this).data('id'));

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "../auftrag/a_auftrag.php",
            data: {id: id},
            success: function (data) {
                $(".records_content").html(data);
            }
        });
    });
});


