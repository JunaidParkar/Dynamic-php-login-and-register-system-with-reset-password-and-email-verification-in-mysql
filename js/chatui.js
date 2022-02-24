document.getElementById("body").onload = () => {
    document.getElementsByClassName("main_chat")[0].getElementsByClassName("message")[document.getElementsByClassName("main_chat")[0].getElementsByClassName("message").length - 1].setAttribute("id", "bottom_msg")
    if (window.location.href.indexOf("#bottom_msg") > -1) {
        window.location = window.location
    } else {
        window.location = window.location + "#bottom_msg"
    }
}

// resetting image size starts

document.getElementById("dp").style.width = ((document.getElementById("dp_cont").clientWidth) / 1.5) + "px"
document.getElementById("dp").style.height = document.getElementById("dp").style.width

// resetting image size ends

// menu slider starts

document.getElementById("menu_onn").onclick = () => {
    document.getElementById("info_page").style.transition = ".5s"
    document.getElementById("info_page").style.left = "0vw"
    document.getElementById("slider").style.transition = ".2s"
    document.getElementById("slider").style.display = "block"
}

document.getElementById("close_menu").onclick = () => {
    document.getElementById("info_page").style.left = "-50vw"
    document.getElementById("slider").style.transition = ".2s"
    document.getElementById("slider").style.display = "none"
}

// menu slider ends

// notice slider starts

document.getElementById("notice").onclick = () => {
    document.getElementById("notice_section").style.transition = ".2s"
    document.getElementById("close_notice").style.transition = ".2s"
    document.getElementById("notice_section").style.bottom = "0"
    document.getElementById("close_notice").style.display = "block"
}

document.getElementById("close_notice").onclick = () => {
    document.getElementById("notice_section").style.bottom = "-80vh"
    document.getElementById("close_notice").style.display = "none"
}

// notice slider ends

// send button input type starts

document.getElementById("message_text").onkeyup = () => {
    if ((document.getElementById("message_text").value) == "") {
        document.getElementById("btn").style.display = "flex"
        document.getElementById("btn2").style.display = "none"
    } else {
        document.getElementById("btn").style.display = "none"
        document.getElementById("btn2").style.display = "flex"
    }
}

if (document.getElementById("message_text").value == "") {
    document.getElementById("btn").style.display = "flex"
    document.getElementById("btn2").style.display = "none"
} else {
    document.getElementById("btn").style.display = "none"
    document.getElementById("btn2").style.display = "flex"
}

// send button input type ends