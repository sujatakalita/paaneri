function checkQty(){
    const qty = $('#qty').val();
    if(qty < 1){
        toastr.warning("Invalid quantity value !");
        $('#qty').val(1);
    }
}

function deleteItem(id){
    const url = 'cart/deleteCartItem';
    swal({
      title: "Remove Item",
      text: "Are you sure you want to remove this item?",
      icon: "warning",
      buttons: [
        'CANCEL',
        'REMOVE'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(result) {
                if(result == "1"){
                    toastr.success("Product successfully removed from your cart !");
                    $(document).ready(function () {
                        setTimeout(function(){
                            location.reload();
                        }, 1500);
                    });
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}