export function Friends() {
    let Friends = $(`
        <div class="my-friends">
            <div class="preloader">
                <img src="../../assets/VAyR.gif" alt="">
            </div>
            <div class="head">
                <span class="back">
                <i class="fa fa-arrow-left ico" aria-hidden="true"></i>
            </span>
            <h2>Add more friends</h2>
            </div>
            <div class="friends-list">
                
            </div>
        </div>
    `)
    $(".content").find(".chatarea").hide(1000)
    $(".content").append(Friends)
    $.post("../../src/friends.php", null, null, "JSON")
        .done(function (result) {
            result.forEach(elm => {
                console.log(elm);
                $(".friends-list").append(`
                    <div class="details">
                        <div class="avatar">
                            <img src="../../assets/${elm.image}.jpeg" alt="">
                         <p class="username">
                            <span class="name"> ${elm.firstname} ${elm.lastname}</span>
                        <span class="mail">${elm.email}</span>
                        </div>
                     </p>
                        <button type="button" class="btn">
                            <i class="fas fa-user-plus log-ico"></i>
                            Add
                        </button>
                    </div>
                `)
            });
            $(".preloader").hide()
        })
}