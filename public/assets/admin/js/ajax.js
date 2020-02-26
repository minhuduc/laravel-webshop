$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    //Edit category
    $('.edit').click(function(){
        let id = $(this).data('id');
        
        $.ajax({
            url : 'admin/category/' + id + '/edit',
            dataType : 'json',
            type : 'get',
            success : function($result){
                console.log($result)
                $('.name').val($result.name);
                $('.title').text($result.name);
                $('#status').val($result.status);
            }
        });
        $('.update').click(function(){
            let name = $('.name').val();
            let status = $('#status').val();
            $('.error').hide();
            $.ajax({
                url : 'admin/category/' + id,
                data : {
                    name : name,
                    status : status
                },
                type : 'put',
                dataType : 'json',
                success : function($result){
                    console.log($result, "result");
                    
                    if($result.error){
                        $('.error').show();
                        $('.error').text($result.error.name[0]);
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });

    // Delete category
    $('.delete').click(function(){
        let id = $(this).data('id');
        $('.del').click(function(){
            $.ajax({
                url : 'admin/category/' + id,
                dataType : 'json',
                type : 'delete',
                success : function($result){
                    $('#delete').modal('hide');
                    location.reload();
                }
            })
        })
    })

    //product type
    //Edit product type
    $('.editProductType').click(function(){
        let id = $(this).data('id');
        
        $.ajax({
            url : 'admin/producttype/' + id + '/edit',
            dataType : 'json',
            type : 'get',
            success : function($result){
                console.log($result)
                $('.name').val($result.name);
                $('.title').text($result.name);
                $('#cate').val($result.category);
                $('#status').val($result.status);
            }
        });
        $('.updateProducttype').click(function(){
            let name = $('.name').val();
            let cate = $('#cate').val();
            let status = $('#status').val();
            $('.error').hide();
            $.ajax({
                url : 'admin/producttype/' + id,
                data : {
                    name : name,
                    category : cate,
                    status : status
                },
                type : 'put',
                dataType : 'json',
                success : function($result){
                    console.log($result, "result");
                    
                    if($result.error){
                        $('.error').show();
                        $('.error').text($result.error.name[0]);
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });

    // Delete product type
    $('.deleteProductType').click(function(){
        let id = $(this).data('id');
        $('.delProductType').click(function(){
            $.ajax({
                url : 'admin/producttype/' + id,
                dataType : 'json',
                type : 'delete',
                success : function($result){
                    $('#delete').modal('hide');
                    location.reload();
                }
            })
        })
    })
});