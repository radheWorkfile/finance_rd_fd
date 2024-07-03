function changeStatus(id, status, table, loader) {
    if (confirm("Do You Want To Changes")) {
        $("#" + id).html('<img src="' + base_url + 'media/images/loading.gif" style="width:57px;" />');
        $.ajax({
            type: 'POST',
            url: base_url + loader,
            data: { 'id': id, 'status': status, 'table': table, 'loader': loader },
            success: function(data) {
                $("#" + id).html(data);
            }
        })
    }
}

function update_rate(id) {
    $("#msg" + id).html('<img src="' + base_url + 'media/images/loading.gif" style="width:90px;">');
    var mrp = $("#mrp" + id).val();
    var selling_price = $("#selling_price" + id).val();
    var mrp_type = $("#mrp_type" + id).val();
    var stock = $("#stock" + id).val();
    var stockold = $("#stockold" + id).val();
    $.ajax({
        url: base_url + 'admin/product/update_rate',
        data: { 'id': id, 'mrp': mrp, 'selling_price': selling_price, 'mrp_type': mrp_type, 'stock': stock, 'stockold': stockold },
        type: 'POST',
        success: function(data) {
            //alert(data);
            $("#msg" + id).html(data);
        }
    });
}

function show_voucher_type(id) {
    $("#voucher_type").html('<option>Loading..</option>');
    $.ajax({
        type: 'POST',
        url: base_url + 'admin/order/voucher_type',
        data: { 'id': id },
        success: function(data) {
            $("#voucher_type").html(data);
        }
    })
}