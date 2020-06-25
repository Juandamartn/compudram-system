let dropdown = document.querySelector('.menu-container__dropdown'),
    dropdownMenu = document.querySelector('.menu-item'),
    modal = document.querySelector('.modal'),
    modalDelete = document.querySelector('.modal__delete'),
    modalCheckout = document.querySelector('.modal__checkout');

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
    let modalPane = document.querySelector('.modal__delete .modal__pane__buttons input');

    modal.classList.toggle('hidden');

    if (modalDelete.classList.contains('hidden')) {
        modalDelete.classList.toggle('hidden');
        modalCheckout.classList.toggle('hidden');
    }

    modalPane.setAttribute('form', `delete${id}`);

    event.preventDefault();
}

function confirmCheckout(event, id, charge) {
    let modalPane = document.querySelector('.modal__checkout .modal__pane__buttons input');
    let chargeLabel = document.querySelector('.modal__checkout p');

    modal.classList.toggle('hidden');

    if (modalCheckout.classList.contains('hidden')) {
        modalCheckout.classList.toggle('hidden');
        modalDelete.classList.toggle('hidden');
    }

    modalPane.setAttribute('form', `checkout${id}`);

    if (charge == 0) {
        chargeLabel.innerHTML = 'Cobrar';

        let chargeInput = document.createElement('INPUT');
        chargeInput.setAttribute('type', 'text');
        chargeInput.setAttribute('onkeyup', `updateCharge(this.value, ${id})`);

        document.querySelector('.modal__checkout .checkout__input').innerHTML = '';
        document.querySelector('.modal__checkout .checkout__input').appendChild(chargeInput);
    } else {
        document.querySelector('.modal__checkout .checkout__input').innerHTML = '';
        chargeLabel.innerHTML = '¿Cobrar $' + charge + '?'
    }

    event.preventDefault();
}

function updateCharge(charge, id) {
    let input = document.querySelector(`#input${id}`);

    input.value = charge;
}

function closeModal() {
    modal.classList.toggle('hidden');
}

function closeAlert(container) {
    container.classList.toggle('hidden');
}