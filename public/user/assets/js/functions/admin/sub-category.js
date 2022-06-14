function deleteSubCategory(id) {
	const url = 'sub-category/delete';
    swal({
      title: "Delete !",
      text: "Are you sure you want to remove this sub category ?",
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
                    toastr.success(" Sub Category deleted successfully !");
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}


$('#mega_menu_id').change(function(){
    var id = $(this).val();
    const url = 'sub-category/getCategory/'+id;
    $('#parent_id').find('option').not(':first').remove();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                for(var i=0; i<len; i++){
                    var id = response['data'][i].category_id;
                    var name = response['data'][i].name;
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                    $("#parent_id").append(option);
                }
            }
        }
    });
});

$('#edit_mega_menu_id').change(function(){
    var id = $(this).val();
    const url = 'sub-category/getCategory/'+id;;
    $('#edit_parent_id').find('option').not(':first').remove();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                for(var i=0; i<len; i++){
                    var id = response['data'][i].category_id;
                    var name = response['data'][i].name;
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                    $("#edit_parent_id").append(option);
                }
            }
        }
    });
});

function editSubCategory(id) {
    const url = 'sub-category/getOne/'+id;
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        success: function(response) {
            $('#sub_category_edit').modal('toggle');
            $('#name').val(response.data.name);
            $('#edit_id').val(response.data.id);
            $('#seoTitle').val(response.data.seoTitle);
            $('#seoDescription').val(response.data.seoDescription);
            $('#seoKeywords').val(response.data.seoKeywords);
            $('#canonicalUrl').val(response.data.canonicalUrl);            
        }
    });
}