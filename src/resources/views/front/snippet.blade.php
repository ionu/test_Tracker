(function() {
    // Check if a unique url already exists in localStorage
    const visitedUrls = JSON.parse(localStorage.getItem('urls'));

    const url = location.protocol + '//' + location.host + location.pathname;
    const urls = Array();

    if (!visitedUrls) {
        // Generate a new unique ID if none exists and save it in localStorage
        urls.push(url);
        localStorage.setItem('urls', JSON.stringify(urls));
        sendData(url);
    } else {
        if (!visitedUrls.includes(url)) {
            visitedUrls.push(url);
            localStorage.setItem('urls', JSON.stringify(visitedUrls));
            sendData(url);
        }
    }
})();

function sendData(url)
{
    fetch('{{ env('APP_URL') }}/add', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            url: url,
            user_id: {{ $user_id }}
        })
    });
}
