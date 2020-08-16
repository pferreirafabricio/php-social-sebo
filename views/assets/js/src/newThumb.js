/* eslint-disable no-restricted-syntax */
import {
  validateFiles,
} from './validations.min.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmRegisterThumb'];
  const elThumb = elForm['thumb'];

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const spanError = elThumb.parentNode.querySelector('span.invalid-feedback');

    if (validateFiles(elThumb.files)) {
      elForm.submit();
    } else if (elThumb.files.length === 0) {
      spanError.innerHTML = 'Please, select an image!';
      elThumb.classList.add('is-invalid');
    } else {
      spanError.innerHTML = 'Please, select a valid image!';
      elThumb.classList.add('is-invalid');
    }
  });
});
