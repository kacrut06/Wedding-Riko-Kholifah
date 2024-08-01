document.getElementById('commentForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('/submit-comment', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('commentsSection').innerHTML += `<div class='comment'>${data}</div>`;
    })
    .catch(error => console.error('Error:', error));
});
