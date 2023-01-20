export function themeSettings() {
    let themeSettings = $(`
        <div class="modal fade" id="themeSettings" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Label">Theme Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="theme">
                            <div class="res">
                                
                            </div>
                            <div>
                                <div>
                                <input type="radio" name="theme" value="light" id="light">
                                <label for="light">Light</label>
                            </div>
                            <div>
                                <input type="radio" name="theme" value="dark" id="dark">
                                <label for="dark">Dark</label>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" form="theme">Save</button>
                    </div>
                </div>
            </div>
        </div>
    `)
    $(".settingsPg").append(themeSettings)
    $.post("../../src/userDetails.php", null, null, "JSON")
        .done(function (result) {
            if (result.theme == "light") {
                $("#light").prop({ 'checked': true })
            } else {
                $("#dark").prop({ 'checked': true })
            }
        })
    $("#theme").on('submit', function (e) {
        e.preventDefault()
        $.post({
            url: "../../src/updateTheme.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
        })
            .done(function (res) {
                if ($("#dark").is(":checked") == true) {
                    sessionStorage.setItem("theme", "dark")
                } else {
                    sessionStorage.setItem("theme", "light")
                }
                $("#theme .res").empty().append(res.trim())
                $(".hidden").text(sessionStorage.getItem("theme"))
            })
    })
}