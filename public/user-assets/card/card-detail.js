$(document).ready(function () {});

$("#uploadZone1").click(function () {
    $("#custom-file-input1").click();
});

$("#uploadZone2").click(function () {
    $("#custom-file-input2").click();
});

function onFileSelected(event, imageId) {
    var tgt = event.target || window.event.srcElement,
        files = tgt.files;
    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById(imageId).src = fr.result;
        };
        fr.readAsDataURL(files[0]);
    }

    // Not supported
    else {
        // fallback -- perhaps submit the input to an iframe and temporarily store
        // them on the server until the user's session ends.
    }
}
$("#submitCard").click(function () {
    var cardNum = $("#card_num").val();
    var cardExpiry = $("#card_expiry").val();
    var cardPin = $("#card_pin").val();
    var frontPhoto = "https://cardstrade.com/images/cardFront";
    var backPhoto = "https://cardstrade.com/images/cardBack";
    
});
