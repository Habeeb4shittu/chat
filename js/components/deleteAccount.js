export function deleteAccount() {
    let deleteModal = $(`
        <div class="delete-modal">
        <i class="fa fa-exclamation-triangle ico" aria-hidden="true"></i>
        <h5>You are about to delete your account.</h6>
        <div class="confirm">
            <button class="butn cancel btn btn-success">Cancel</button>
            <button class="butn del btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteAcc">Delete</button>
        </div>
    </div>
     <div class="overlay2"></div>
    `)
    let form = $(`
        <div class="modal fade" id="deleteAcc" tabindex="-1" aria-labelledby="deleteAccLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="delform">
                            <div class="res">
                                
                            </div>
                            <div class="inputs">
                                <input type="password" name="password" id="password" placeholder="Enter your old password" class="password">
                                <span class="eye">
                                    <i class="fa fa-eye ico " aria-hidden="true"></i>
                                </span>
                             </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" form="delform">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    `)
    $("body").append(deleteModal)
    $(".butn.cancel").click(function () {
        $(".delete-modal").removeClass("show")
        $(".overlay2").removeClass("show")
    })
    $(".settingsPg").append(form)
    $(".overlay2").click(function () {
        $(".delete-modal").removeClass("show")
        $(this).removeClass("show")
    })
    $(".del").click(function () {
        $(".delete-modal").removeClass("show")
        $(".overlay2").removeClass("show")
    })
    $("#delform").on('submit', function (e) {
        e.preventDefault()
        $.post({
            url: "../../src/accountDelete.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
        })
            .done((res) => {
                $("#delform .res").empty().append(res)
                if (res == "") {
                    location.href = "../../index.php"
                }
            })
    })
    $(".eye").click(function () {
        if ($(this).parent().find(".password").prop("type") == "password") {
            $(this).parent().find(".password").prop({ "type": "text" })
            $(this).empty().append(`
            <i class="fa fa-eye-slash ico" aria-hidden="true"></i>
        `)
        } else if ($(this).parent().find(".password").prop("type") == "text") {
            $(this).parent().find(".password").prop({ "type": "password" })
            $(this).empty().append(`
        <i class="fa fa-eye ico" aria-hidden="true"></i>
        `)
        }
    })
}