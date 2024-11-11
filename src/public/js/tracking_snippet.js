function copySnippet() {
    // Get the text from the input field
    const text = document.getElementById('yomali_js_snippet').value;

    // Copy text to clipboard
    navigator.clipboard.writeText(text)
        .then(() => {
            // Display success message
            document.getElementById('yomali_copy_status').innerText = 'Snippet added to the clipboard!';
        });
}


