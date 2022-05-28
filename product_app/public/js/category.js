$(document).ready(function(){
    $("#addCategory").click(function(){

        var action = $("#addProductForm").attr('action');
        var token  = $("input[name='_token']").val();
        var form_data = {
            _token: token,
            categoryName: $("#category_name").val(),
            is_ajax: 1
        };

        $.ajax({
            type: "POST",
            url: action,
            data: form_data,
            success: function(response)
            {
                console.log(response);
                if(response.message == "success") {
                    setTimeout(function() {
                        window.location.href = "/new-category";
                    }, 1000);
                }
                else {
                }
            }
        });
        return false;
    });

    $("#updateCategory").click(function(){

        var action = $("#updateProductForm").attr('action');
        var token  = $("input[name='_token']").val();
        var itr    = $("input[name='_iteration']").val();
        var form_data = {
            _token: token,
            categoryName: $("#category_name_" + itr).val(),
            is_ajax: 1
        };

        $.ajax({
            type: "PATCH",
            url: action,
            data: form_data,
            success: function(response)
            {
                console.log(response);
                if(response.message == "success") {
                    setTimeout(function() {
                        window.location.href = "/new-category";
                    }, 1000);
                }
                else {
                }
            }
        });
        return false;
    });

    $("#deleteCategory").click(function () {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            dangerMode: true,
          }).then(function(isConfirm) {
            if (isConfirm) {
              swal({
                title: 'Shortlisted!',
                text: 'Candidates are successfully shortlisted!',
                icon: 'success'
              }).then(function() {
                var action = $("#updateProductForm").attr('action');
                var token  = $("input[name='_token']").val();
                var form_data = {
                    _token: token,
                    is_ajax: 1
                };
                
                $.ajax({
                    type: "DELETE",
                    url: action,
                    data: form_data,
                    success: function(response)
                    {
                        console.log(response);
                        if(response.message == "success") {
                            setTimeout(function() {
                                window.location.href = "/new-category";
                            }, 1000);
                        }
                        else {
                        }
                    }
                });
              });
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          })
    })
});