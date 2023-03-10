import { deleteAccount } from "../components/deleteAccount.js"
import { passwordReset } from "../components/passwordReset.js"
import { profileSettings } from "../components/profileSettings.js"
import { themeSettings } from "../components/themeSettings.js"

export function Settings() {
    let settings = $(`
         <div class="settingsPg">
            <div class="head">
                <div>
                    <span class="back">
                <i class="fa fa-arrow-left ico" aria-hidden="true"></i>
            </span>
            <h3>Settings</h3>
                </div>
                <div class="image">
                    
                </div>
            </div>
            <div class="set">
                <button class="setting profilebtn" type="button" data-bs-toggle="modal" data-bs-target="#modelId">
                    <i class="fas fa-id-badge icon"></i>
                    <h5>Profile Settings</h5>
                </button>
                <button class="setting" data-bs-toggle="modal" data-bs-target="#themeSettings">
                    <i class="fas fa-sun icon"></i>
                    <h5>Themes</h5>
                </button>
                <button class="setting" data-bs-toggle="modal" data-bs-target="#reset">
                    <i class="fas fa-retweet icon"></i>
                    <h5>Reset My Password</h5>
                </button>
                <button class="setting delete">
                    <i class="fas fa-trash icon"></i>
                    <h5>Delete my account</h5>
                </button>
                <button class="setting">
                    <i class="fas fa-address-card icon"></i>
                    <h5>About the app</h5>
                </button>
            </div>
            <div class="foot">
                Chat App by  Halbion <i class="fab fa-dev ico"></i> 
            </div>
         </div>
    `)
    $(".content").find(".chatarea").hide(1000)
    $(".content").find(".my-friends").hide(1000)
    $(".content").empty().append(settings)
    $(".content").find(".chatarea").remove()
    $(".content").find(".my-friends").remove()
    profileSettings()
    themeSettings()
    passwordReset()
    deleteAccount()
    if ($(".hidden").text() == "dark") {
        $(".setting").addClass("dark")
        $(".ico").addClass("dark")
        $(".head h3").addClass("dark")
    }
    $(".delete").click(() => {
        $(".delete-modal").toggleClass("show")
        $(".overlay2").addClass("show")
    })

}