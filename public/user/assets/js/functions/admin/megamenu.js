function deleteMegaCategory(id) {
	const url = 'mega-menu/delete';
    swal({
      title: "Delete !",
      text: "Are you sure you want to remove this item ?",
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
                    toastr.success(" Mega menu item deleted successfully !");
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}


function editMegaCategory(id) {
    const url = 'mega-menu/getOne/'+id;
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        success: function(response) {
            $('#edit_mega_menu').modal('toggle');
            $('#mega_menu_name').val(response.data.name);
            $('#id').val(response.data.id);
        }
    });
}