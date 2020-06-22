let dropdown = document.querySelector('.menu-container__dropdown'),
    dropdownMenu = document.querySelector('.menu-item');

if (dropdown) {
    dropdown.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });
}
