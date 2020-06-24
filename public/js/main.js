let dropdown = document.querySelector('.menu-container__dropdown'),
    dropdownMenu = document.querySelector('.menu-item'),
    modal = document.querySelector('.modal');

if (dropdown) {
    dropdown.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imgTag = document.querySelector('.form__button img');

        reader.onload = function (e) {
            imgTag.setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function confirmDelete(event, id) {
    let modalPane = document.querySelector('.modal__pane__buttons input');

    modal.classList.toggle('hidden');
    modalPane.setAttribute('form', `delete${id}`);

    event.preventDefault();
}

function closeModal() {
    modal.classList.toggle('hidden');
}