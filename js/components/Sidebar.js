export function Sidebar() {
    $(".btn").each((i, el) => {
        $(el).click(() => {
            $(el).parent().parent().find(".active").removeClass("active")
            $(el).addClass("active")
        })
    })

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
}