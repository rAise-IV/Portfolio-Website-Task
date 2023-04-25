const form = document.getElementById('blog-form');
const title = document.getElementById('title');
const clearButton = document.getElementById('clear');
const entryText = document.getElementById('entry-text');

form.addEventListener('submit', (event) => {
    if (title.value.trim() == "" || entryText.value.trim() == "") {
        event.preventDefault();
        if (title.value.trim() == "") {
            title.classList.add('invalid');
        } else {
            title.classList.remove('invalid');
        }
        if (entryText.value.trim() == "") {
            entryText.classList.add('invalid');
        } else {
            entryText.classList.remove('invalid');
        }
    } else {
        title.classList.remove('invalid');
        entryText.classList.remove('invalid');
    }
});

clearButton.addEventListener('click', (event) => {
    event.preventDefault();
    form.reset();
    title.classList.remove('invalid');
    entryText.classList.remove('invalid');
});