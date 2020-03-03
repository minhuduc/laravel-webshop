$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Edit category
$(document).ready(function(){
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
});
    
    //product 
$(document).ready(function(){

    //Edit product 
    $('.editProduct').click(function(){
        let id = $(this).data('id');
        
        $.ajax({
            url : 'admin/product/' + id + '/edit',
            dataType : 'json',
            type : 'get',
            success : function($result){
                console.log($result)
                $('.name').val($result.name);
                $('.description').val($result.description);
                $('.quantity').val($result.quantity);
                $('.price').val($result.price);
                $('.promotional').val($result.promotional);
                $('.title').text($result.name);
                $('#cate').val($result.idCategory);
                $('#producttype').val($result.idProductType);
                $('#status').val($result.status);
            }
        });
        $('.updateProduct').click(function(){
            let name = $('.name').val();
            let description = $('.description').val();
            let quantity = $('.quantity').val();
            let price = $('.price').val();
            let promotional = $('.promotional').val();
            let category = $('#cate').val();
            let producttype = $('#producttype').val();
            let status = $('#status').val();
            $('.error').hide();
            $.ajax({
                url : 'admin/product/' + id,
                data : {
                    name : name,
                    description : description,
                    quantity : quantity,
                    price : price,
                    promotional : promotional,
                    category : category,
                    producttype : producttype,
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

    // Delete product 
    $('.deleteProduct').click(function(){
        let id = $(this).data('id');
        $('.delProduct').click(function(){
            $.ajax({
                url : 'admin/product/' + id,
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

    //product type
$(document).ready(function(){

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