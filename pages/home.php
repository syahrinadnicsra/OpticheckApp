<html>

<head>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body>
    <input type="text" id="inputText" placeholder="Masukkan teks" />
    <button onclick="generateQRCode()">Buat QR Code</button>
    <div id="qrcode"></div>

    <script>
    function generateQRCode() {
        var textToEncode = document.getElementById("inputText").value;
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: textToEncode,
            width: 128,
            height: 128,
        });
    }
    </script>
</body>

</html>