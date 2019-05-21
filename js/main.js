$('.update__task').click(function () {
    let id=$(this).data('id');
    let task=$(this).siblings('.input__task').val();
    $.ajax({
        url:'admin',
        type:"POST",
        data:({
            id:id,
            task:task
        }),
        success: function () {

        },
        error:function () {

        }
    })
});


$('.update__status').click(function () {
    let id=$(this).data('id');
    let status=$(this).data('status');
    $.ajax({
        url: 'admin',
        type:'POST',
        data:({
            id:id,
            status:status
        }),
        success:function () {

        },
        error:function () {

        }
    })
})