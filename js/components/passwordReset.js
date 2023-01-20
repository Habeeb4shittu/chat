export function passwordReset() {
    let reset = $(`
        <div class="modal fade" id="reset" tabindex="-1" aria-labelledby="resetLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetLabel">Reset your Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="resetForm">
                        <div class="res">
                                
                            </div>
                            <div class="inputs">
                                <input type="password" name="password" id="password" placeholder="Enter your old password" class="password">
                                <span class="eye">
                                    <i class="fa fa-eye ico " aria-hidden="true"></i>
                                </span>
                             </div>
                            <div class="inputs">
                                <input type="password" name="newpass" id="newpass" placeholder="Enter your new password" class="password">
                                <span class="eye">
                                    <i class="fa fa-eye ico " aria-hidden="true"></i>
                                </span>
                             </div>
                            <div class="inputs">
                                <input type="password" name="confirm_newpass" id="confirm_newpass" placeholder="Confirm your new password" class="password">
                                <span class="eye">
                                    <i class="fa fa-eye ico " aria-hidden="true"></i>
                                </span>
                             </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" form="resetForm">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    `)
    $(".settingsPg").append(reset)
    $("#resetForm").on('submit', function (e) {
        e.preventDefault()
        $.post({
            url: "../../src/passwordReset.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
        })
            .done((res) => {
                $("#reset .res").empty().append(res)
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