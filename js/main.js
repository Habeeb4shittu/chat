let count = 1
$(".eye").click(function () {
    count++
    if (count % 2 == 0) {
        $(this).parent().find(".password").prop({ "type": "text" })
        $(this).empty().append(`
            <i class="fa fa-eye-slash ico" aria-hidden="true"></i>
        `)
    }
    else {
        $(this).parent().find(".password").prop({ "type": "password" })
        $(this).empty().append(`
        <i class="fa fa-eye ico" aria-hidden="true"></i>
        `)
    }
})
$(".error").parent().find(".inputs").addClass("redBord")
setTimeout(() => {
    $(".error-big").fadeOut()
}, 1500);