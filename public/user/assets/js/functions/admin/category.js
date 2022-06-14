function deleteCategory(id) {
	const url = 'category/delete';
    swal({
      title: "Delete !",
      text: "Are you sure you want to remove this category ?",
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
                    toastr.success(" Category deleted successfully !");
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}

function editCategory(id) {
    const url = 'category/getOne/'+id;
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        success: function(response) {
            $('#category_edit').modal('toggle');
            $('#name').val(response.data.name);
            $('#id').val(response.data.id);
            $('#seoTitle').val(response.data.seoTitle);
            $('#seoDescription').val(response.data.seoDescription);
            $('#seoKeywords').val(response.data.seoKeywords);
            $('#canonicalUrl').val(response.data.canonicalUrl);            
        }
    });
}