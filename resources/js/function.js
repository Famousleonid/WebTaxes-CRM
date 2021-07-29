window.test = function () {
    console.log('глобально js функция');
}

window.encrypt = function (str) {

    if (isString(str)) {
        let encrypted = CryptoJS.AES.encrypt(str, "mdxspl");
        return encrypted.toString();
    }
    return 'на шифрование передана НЕ строка';
}
window.decrypt = function (str) {

    if (isString(str)) {
        let decrypted = CryptoJS.AES.decrypt(str, "mdxspl");
        return decrypted.toString(CryptoJS.enc.Utf8);
    }
    return 'на ДЕшифрование передана НЕ строка';
}

function isString(val) {
    return (typeof val === "string" || val instanceof String);
}
