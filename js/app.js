var toggle = document.querySelector(".menu");
toggle.style.maxHeight = "200px";
function my() {
    if (toggle.style.maxHeight == "0px") {
        toggle.style.maxHeight = "200px";
    }
    else {
        toggle.style.maxHeight = "0px";
    }
}
my();