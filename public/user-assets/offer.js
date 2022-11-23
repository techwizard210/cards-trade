var index;

$(document).ready(function () {
    index = $("#getMoreBtn").attr("data_index");
});

$("#getMoreBtn").click(function () {
    index++;
    var cardId = $("#getMoreBtn").attr("data_cardid");
    var price = $("#getMoreBtn").attr("data_price");
    var count = $("#getMoreBtn").attr("data_count");
    if ((index - 1) * 5 > count) {
        toastr.error("No offers", "Error");
        return;
    } else
        $.ajax({
            url: HOST_URL + "/more-offer",
            type: "get",
            data: {
                cardId: cardId,
                price: price,
                index: index,
            },
            success: function (response) {
                $("#offersList").empty();
                var offersList = [];
                var price = response.price;
                offersList = response.offers;
                for (var i = 0; i < offersList.length; i++) {
                    var theme =
                        "" +
                        '<div class="d-flex offer-card align-items-center">' +
                        '                                        <div class="d-flex flex-column first-item"><span' +
                        '                                                style="color: #fb6a25">' +
                        offersList[i].username +
                        "</span>" +
                        '                                            <div class="d-flex align-items-center"' +
                        '                                                style="margin-top: 10px; margin-bottom: 20px"><svg width="20"' +
                        '                                                    height="20" stroke="currentColor" viewBox="0 0 16 16" fill="none"' +
                        '                                                    class="icon-16 mr-1 text-success">' +
                        '                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"' +
                        '                                                        d="M4.952 6.768l2.774-3.62A1.317 1.317 0 019.79 3.11c.199.244.305.548.305.869V6.47h2.36c.456 0 .883.229 1.134.602l.244.374c.221.335.29.754.175 1.135l-1.036 3.596c-.175.587-.708.99-1.318.99H6.857c-.38 0-.747-.16-1.006-.441l-.899-1.06m-.804 1.524H2.709a.805.805 0 01-.804-.807v-5.63c0-.45.358-.808.804-.808h1.439c.442 0 .804.358.804.8v5.623c0 .441-.365.822-.804.822z">' +
                        "                                                    </path>" +
                        "                                                </svg>" +
                        '                                                <span style="margin-left: 10px">1</span>' +
                        "                                            </div>" +
                        '                                            <div class="d-flex align-items-center" style="padding: auto 0"><svg' +
                        '                                                    height="10" width="10">' +
                        '                                                    <circle cx="5" cy="5" r="5" fill="#2d9f1f" />' +
                        "                                                </svg>" +
                        '                                                <span style="margin-left: 10px">online</span>' +
                        "                                            </div>" +
                        "                                        </div>" +
                        '                                        <div class="d-flex small-container align-items-center justify-content-between">' +
                        '                                            <div class="second-item">' +
                        '                                                <img style="height: 80%; background-position: center;background-repeat: no-repeat; background-size: cover;"' +
                        '                                                    src="images/' +
                        offersList[i].gateway +
                        '.png" />' +
                        "                                            </div>" +
                        '                                            <div class="font-weight-bold third-item">' +
                        "                                                " +
                        (offersList[i].price * price) / 100 +
                        " USD</div>" +
                        '                                            <div class="fourth-item"><a' +
                        "                                                    href='" +
                        HOST_URL +
                        "/gateway?offerId=" +
                        offersList[i].id +
                        "'>" +
                        "<button" +
                        '                                                        class="btn btn-dark btn-rounded blueBtn">sell</button></a>' +
                        "                                            </div>" +
                        "                                        </div>" +
                        "                                    </div>" +
                        "";

                    $("#offersList").append(theme);
                }
            },
            error: function (response) {
                toastr.error("Server Connection Failed. Try again.", "Error");
            },
        });
});

$("#re-find").click(function () {
    var cardId = $("#reCardId").val();
    var gatewayId = $("#seller-merchant-select").val();
    var price = $("#rePrice").val();
    $.ajax({
        url: HOST_URL + "/re-offer",
        type: "get",
        data: {
            cardId: cardId,
            gatewayId: gatewayId,
            price: price,
        },
        success: function (response) {
            $("#offersList").empty();
            var offersList = [];
            var price = response.price;
            offersList = response.offers;
            for (var i = 0; i < offersList.length; i++) {
                var theme =
                    "" +
                    '<div class="d-flex offer-card align-items-center">' +
                    '                                        <div class="d-flex flex-column first-item"><span' +
                    '                                                style="color: #fb6a25">' +
                    offersList[i].username +
                    "</span>" +
                    '                                            <div class="d-flex align-items-center"' +
                    '                                                style="margin-top: 10px; margin-bottom: 20px"><svg width="20"' +
                    '                                                    height="20" stroke="currentColor" viewBox="0 0 16 16" fill="none"' +
                    '                                                    class="icon-16 mr-1 text-success">' +
                    '                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"' +
                    '                                                        d="M4.952 6.768l2.774-3.62A1.317 1.317 0 019.79 3.11c.199.244.305.548.305.869V6.47h2.36c.456 0 .883.229 1.134.602l.244.374c.221.335.29.754.175 1.135l-1.036 3.596c-.175.587-.708.99-1.318.99H6.857c-.38 0-.747-.16-1.006-.441l-.899-1.06m-.804 1.524H2.709a.805.805 0 01-.804-.807v-5.63c0-.45.358-.808.804-.808h1.439c.442 0 .804.358.804.8v5.623c0 .441-.365.822-.804.822z">' +
                    "                                                    </path>" +
                    "                                                </svg>" +
                    '                                                <span style="margin-left: 10px">1</span>' +
                    "                                            </div>" +
                    '                                            <div class="d-flex align-items-center" style="padding: auto 0"><svg' +
                    '                                                    height="10" width="10">' +
                    '                                                    <circle cx="5" cy="5" r="5" fill="#2d9f1f" />' +
                    "                                                </svg>" +
                    '                                                <span style="margin-left: 10px">online</span>' +
                    "                                            </div>" +
                    "                                        </div>" +
                    '                                        <div class="d-flex small-container align-items-center justify-content-between">' +
                    '                                            <div class="second-item">' +
                    '                                                <img style="height: 80%; background-position: center;background-repeat: no-repeat; background-size: cover;"' +
                    '                                                    src="images/' +
                    offersList[i].gateway +
                    '.png" />' +
                    "                                            </div>" +
                    '                                            <div class="font-weight-bold third-item">' +
                    "                                                " +
                    (offersList[i].price * price) / 100 +
                    " USD</div>" +
                    '                                            <div class="fourth-item"><a' +
                    "                                                    href='" +
                    HOST_URL +
                    "/gateway?offerId=" +
                    offersList[i].id +
                    "'>" +
                    "<button" +
                    '                                                        class="btn btn-dark btn-rounded blueBtn">sell</button></a>' +
                    "                                            </div>" +
                    "                                        </div>" +
                    "                                    </div>" +
                    "";

                $("#offersList").append(theme);
            }
        },
        error: function (response) {
            toastr.error("Server Connection Failed. Try again.", "Error");
        },
    });
});

$("#submitCard").click(function () {
    toastr.success("Successfully completed!");
});

