
const handleSubmit = e => {

    e.preventDefault();
    return e.target.submit()
    if (!$("#whatsapp")[0]) return;
    if ($("#whatsapp").val().match(/^\+55\(\d{2}\)9\d{4}\-\d{4}$/gm)) e.target.submit();
    else M.toast({
        html: "Por favor, insira o Whatsapp com DDD, no formato: +55(00)00000-0000"
    });
}

const formats = {
    br: '+55(00)00000-0000',
    au: '+61(00) 0000 0000',
    pt: '+351 000 000 000',
    us: '+1 (000) 000-000'
}

let currentFormat = "br"
var element = document.getElementById("phone");
let mask;
let maskOptions = {
    mask: formats[currentFormat]
};
if (element) {
    mask = IMask(element, maskOptions);

}

const handleSetFormat = (e) => {
    format = e.selectedOptions[0].dataset.format
    currentFormat = format
    mask.updateOptions({
        mask: formats[currentFormat]
    })


}

const handleLoad = () => {
    let challenges = document.getElementById("challenges");
    let info = document.getElementById("info");
    if (!(challenges && info)) return;
    if (getComputedStyle(info).display == "block")
        challenges.style.display = "none";
    else
        challenges.style.display = "block";
}

String.prototype.insert = function (index, string) {
    if (index > 0) {
        return this.substring(0, index) + string + this.substr(index);
    }

    return string + this;
};


$("#register-form").submit(handleSubmit);
$("#login-form").submit(handleSubmit);
$("#user-form").submit(handleSubmit);


// $("#send-photos").click(e => {
//     e.target.classList.add("disabled")
//     e.target.innerText = "Enviando...";
// })

$("#whatsapp").keydown(e => {
    if (currentFormat != "br") return;
    if (e.target.value[7] != "9" && e.target.value.length == 15) {
        tmp = $("#whatsapp").val();
        tmp = tmp.insert(7, "9");
        $("#whatsapp").val(tmp);
    }
})

var clicked = 0;

$(".toggle-password").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("toggle-password");
    if (clicked == 0) {
        $(this).html('<span class="material-icons">visibility_off</span >');
        clicked = 1;
    } else {
        $(this).html('<span class="material-icons">visibility</span >');
        clicked = 0;
    }

    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
document.addEventListener('DOMContentLoaded', function () {
    $('select').formSelect();
    $('.sidenav').sidenav();
});

window.onhashchange = handleLoad;
$('.slider').slider();
$('.materialboxed').materialbox();
$('.collapsible').collapsible();