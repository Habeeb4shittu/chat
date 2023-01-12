import { Chat } from "./components/Chat.js"
import { Chatpage } from "./pages/chatPage.js"
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
$(document).ready(function () {
    Chatpage()
    Chat()
    $(".opt.logout").click(function () {
        $(".logout-modal").addClass("show")
        $(".overlay").addClass("show")
    })
    $(".butn.no").click(function () {
        $(".logout-modal").removeClass("show")
        $(".overlay").removeClass("show")
    })
    $(".butn.out").click(function () {
        location.href = '../src/logout.php'
    })
});