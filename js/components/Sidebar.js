import { Chat } from "./Chat.js";

export function Sidebar() {
    $(".bars").click(function () {
        $("aside").addClass("slide")
        $("main").addClass("full-width")
        $(this).hide()
    })

    $(".close").click(() => {
        $("aside").removeClass("slide")
        $("main").removeClass("full-width")
        $(".bars").show()
    })
    $.post("../../src/recentChats.php", null, null, "JSON")
        .done(function (result) {
            $(result).each(function (i, el) {
                if (el.id == $(".sidebar").data("id")) {
                    return
                } else {
                    $(".users").append(`
                    <div class="user" data-id="${el.id}">
                            <img src="./assets/${el.image}.jpeg" alt="">
                            <button class="link" type="button">${el.firstname} ${el.lastname}
                                <span class="latest"></span>
                            </button>
                        </div>
                `)
                }
            })
            $.post("../../src/latestMsg.php", null, null, "JSON")
                .done(function (result) {
                    $(".latest").each(function (i, el) {
                        $(el).empty().append(result[i].message)
                    })
                })
            $(".user").each((i, el) => {
                $(el).click(function () {
                    let me = $(this)
                    $.post("../../src/friends.php", null, null, "JSON")
                        .done(function (result) {
                            let friendId = me.data("id");
                            $(".nav-details").empty()
                            $(".textbox").remove()
                            Chat()
                            $(".chats").scrollTop(
                                $(".chats")[$(".chats").length - 1].scrollHeight
                            )
                            $("#sendButton").data({ id: friendId })
                            let user = result.filter((user) => user.id == friendId)[0];
                            let image = $(`<img src="../../assets/${user.image}.jpeg" alt=""> `)
                            let name = $(`
                                   <span class="name">${user.firstname} ${user.lastname}</span>
                                `)
                            $(".nav-details").append(image)
                            $(".nav-details").append(name)
                        })
                    $(el).parent().parent().find(".active").removeClass("active")
                    $(el).addClass("active")
                })
            })
        })
    // let recChat = setInterval(recentChat, 1000)
    // function recentChat() {
    //     $.post("../../src/recentChats.php", null, null, "JSON")
    //         .done(function (result) {
    //             $(".users").empty()
    //             $(result).each(function (i, el) {
    //                 if (el.id == $(".sidebar").data("id")) {
    //                     return
    //                 } else {
    //                     $(".users").append(`
    //                 <div class="user" data-id="${el.id}">
    //                         <img src="./assets/${el.image}.jpeg" alt="">
    //                         <button class="link" type="button">${el.firstname} ${el.lastname}</button>
    //                     </div>
    //             `)
    //                 }
    //             })
    //         })
    // $(".users").mouseenter(function () {
    //     clearInterval(recChat)
    // });
    // $(".users").mouseleave(function () {
    //     setInterval(recChat, 1000)
    // });
    // }
}