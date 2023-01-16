import { Chat } from "../components/Chat.js";

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
            <div class="searchBar">
                <input type="text" id="search" placeholder="Start typing to search...">
                <i class="fa fa-search ico" aria-hidden="true"></i>
            </div>
            <h2>Add more friends</h2>
            </div>
            <div class="friends-list">
                
            </div>
        </div>
    `)
    $(".content").find(".chatarea").hide(1000)
    $(".content").append(Friends)
    $(".content").find(".chatarea").remove()
    $.post("../../src/friends.php", null, null, "JSON")
        .done(function (result) {
            result.forEach(elm => {
                // console.log(elm);
                $(".friends-list").append(`
                    <div class="details" data-id="${elm.id}">
                        <div class="avatar">
                            <img src="../../assets/${elm.image}.jpeg" alt="">
                         <p class="username">
                            <span class="name"> ${elm.firstname} ${elm.lastname}</span>
                        <span class="mail">${elm.email}</span>
                        </div>
                     </p>
                        <button type="button" class="btn add-friend">
                            <i class="fas fa-user-plus log-ico"></i>
                            Add
                        </button>
                    </div>
                `)
            });
            $(".preloader").hide()
            $(".details").each((i, el) => {

                $(el).on("click", function () {
                    let friendId = $(this).data("id");
                    Chat()
                    $("#sendButton").data({ id: friendId })
                    let user = result.filter((user) => user.id == friendId)[0];
                    let image = $(`<img src="../../assets/${user.image}.jpeg" alt=""> `)
                    let name = $(`
                       <span class="name">${user.firstname} ${user.lastname}</span>
                    `)
                    $(".nav-details").append(image)
                    $(".nav-details").append(name)
                })

            })
        })
    $("#search").on('input', function () {
        let search = $(this).val()
        let users = $(".details .avatar .username .name")
        users.each(function (i, el) {
            if ($(el).text().toLowerCase().includes(search.toLowerCase())) {
                $(el).parent().parent().parent().show()
            } else {
                $(el).parent().parent().parent().hide()
            }
        })
    })
}