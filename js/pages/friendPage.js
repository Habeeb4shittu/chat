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
    let notfound = $(`
        <p class="results">No results found!!!</p>
    `)
    $(".content").find(".chatarea").hide(1000)
    $(".content").find(".settings").hide(1000)
    $(".content").empty().append(Friends)
    $(".content").find(".chatarea").remove()
    $(".content").find(".settings").remove()
    $.post("../../src/friends.php", null, null, "JSON")
        .done(function (result) {
            result.forEach(elm => {
                // console.log(elm);
                $(".friends-list").append(`
                    <div class="details" data-id="${elm.id}">
                        <div class="avatar">
                            <img src="../../assets/${elm.image}" alt="">
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
            if ($(".hidden").text() == "dark") {
                $(".details").addClass("dark")
                $(".ico").addClass("dark")
            }
            $(".preloader").hide()
            $(".details").each((i, el) => {

                $(el).on("click", function () {
                    let friendId = $(this).data("id");
                    Chat()
                    $("#sendButton").data({ id: friendId })
                    let user = result.filter((user) => user.id == friendId)[0];
                    let image = $(`<img src="../../assets/${user.image}" alt=""> `)
                    let name = $(`
                       <span class="name">${user.firstname} ${user.lastname}</span>
                    `)
                    $(".nav-details").append(image)
                    $(".nav-details").append(name)
                })

            })
            $(".avatar").click(function () {
                let id = $(this).parent().data("id")
                console.log($(".profile"))
                $("body").find($(`.profile`)).removeClass("show")
                $("body").find($(`.profile${id}`)).addClass("show")
                $(".overlay").addClass("show")
                $(".close").click(() => {
                    $(".overlay").removeClass("show")
                    $("body").find($(`.profile`)).removeClass("show")
                })
            })
        })
    $("#search").on('input', function () {
        let search = $(this).val()
        let users = $(".details .avatar .username .name")
        users.each(function (i, el) {
            let user = $(el).parent().parent().parent()
            if ($(el).text().toLowerCase().includes(search.toLowerCase())) {
                user.addClass("show")
                user.show()
            } else {
                user.removeClass("show")
                user.hide()
            }
            let parent = $(".details");
            let show = parent.filter((i, el) => $(el).hasClass("show"));
            show.length == 0 ? $(".friends-list").append(notfound) : $(".friends-list").find(".results").remove()
        })
    })
}