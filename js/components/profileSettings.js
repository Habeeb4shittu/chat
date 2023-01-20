export function profileSettings() {
    $.post("../../src/userDetails.php", null, null,
        "JSON"
    )
        .done(function (result) {
            let profileSettings = $(`
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update your details</h5>
                            </div>
                            <div class="profileModal">
                                <form method="post" id="update_form" enctype="multipart/form-data">
                                        <div class="res">
                                            
                                        </div>
                                        <input type="file" hidden id="image_upl" name="image" value="${result.image}">
                                    <label for="image_upl">
                                        <img src="../../assets/${result.image}" alt="" class="avata preview">
                                    </label>
                                    <input type="text" name="firstname" value="${result.firstname}" id="firstname">
                                    <input type="text" name="lastname" value="${result.lastname}" id="lastname">
                                    <input type="email" name="" value="${result.email}" readonly>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="update_form" class="btn btn-success" name="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            `)
            $(".settingsPg").append(profileSettings)

            $("#image_upl").on("change", function (event) {
                const imageFiles = event.target.files;
                const imageFilesLength = imageFiles.length;
                if (imageFilesLength > 0) {
                    const imageSrc = URL.createObjectURL(imageFiles[0]);
                    const imagePreviewElement = $(".avata.preview");
                    $(imagePreviewElement).attr('src', imageSrc)
                }
            })



            $("#update_form").on('submit', function (ev) {
                ev.preventDefault()
                let image = new FormData()
                let files = $('#image_upl')[0].files[0]
                image.append('file', files)
                $.post({
                    url: "../../src/update.php",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                })
                    .done(function (result) {
                        $("#update_form .res").empty().append(result)
                        // console.log(result);
                        $.post("../../src/userDetails.php", null, null,
                            "JSON"
                        )
                            .done(function (result) {
                                $(".avata").attr('src', `./assets/${result.image}`)
                                $("#firstname").val(result.firstname)
                                $(".side-username").empty().text(result.firstname + " " + result.lastname)
                            })
                    })
            })
        })
}