export function profileView() {
    $(".profile-view").each((i, el) => {
        let id = $(el).parent().parent().data("id");
        $.post("../../src/profile.php", { id }, null, "JSON"
        )
            .done((res) => {
                let modal = $(`
                    <div class="profile profile${res.id}">
                        <div class="image">
                             <img src="../../assets/${res.image}" alt="">
                        </div>
                    
                       <div class="detail">
                            <h2>Firstname: </h2> <h2>${res.firstname}</h2>
                       </div>
                       <div class="detail">
                           <h2>Lastname: </h2> <h2>${res.lastname}</h2>
                       </div>
                       <div class="detail">
                           <h2>Email: </h2> <h2>${res.email}</h2>
                       </div>
                       <div class="detail">
                           <h2>Gender: </h2> <h2>${res.gender}</h2>
                       </div>
                        <button type="button" class="btn btn-danger close">Close</button>
                    </div>
                `)
                $("body").append(modal)
            })
        $(el).click(function () {
            let id = $(this).parent().parent().data("id");
            $("body").find($(`.profile`)).removeClass("show")
            $("body").find($(`.profile${id}`)).addClass("show")
            $(".overlay").addClass("show")
            $(".close").click(() => {
                $(".overlay").removeClass("show")
                $("body").find($(`.profile`)).removeClass("show")
            })
        })
    })
}