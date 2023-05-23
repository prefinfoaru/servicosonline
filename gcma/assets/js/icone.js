iconeSelect = document.getElementById('icone');
exibeIcone = document.getElementById('exibeIcone');
textoInput = document.getElementById('texto');
exibeTexto = document.getElementById('exibeTexto');

iconeSelect.addEventListener('change', () => {
    exibeIcone.className = iconeSelect.value;
});

textoInput.addEventListener('keyup', () => {
    exibeTexto.innerHTML = textoInput.value;
});

function detectURLs(message) {
    var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
    return message.match(urlRegex)
}

function replaceURLs(message) {
    if (!message) return;

    var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
    return message.replace(urlRegex, function (url) {
        var hyperlink = url;
        if (!hyperlink.match('^https?:\/\/')) {
            hyperlink = 'http://' + hyperlink;
        }
        return '<a href="' + hyperlink + '" target="_blank" rel="noopener noreferrer">' + url + '</a>'
    });
}

textoInput.addEventListener('blur', () => {
    exibeTexto.innerHTML = replaceURLs(textoInput.value);
});

optlink1 = document.getElementById('optlink1');
optlink2 = document.getElementById('optlink2');
url = document.getElementById('url');

optlink1.addEventListener('click', () => {
    url.style.display = 'block';
});

optlink2.addEventListener('click', () => {
    url.value = '';
    url.style.display = 'none';
});
