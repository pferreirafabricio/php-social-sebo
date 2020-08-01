/* eslint-disable no-restricted-syntax */
import {
  customValidation,
} from './index.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmRegister'];
  const elPassword = elForm['password'];
  const elConfirmPassword = elForm['confirmPassword'];
  const requiredFields = document.querySelectorAll('[required]');

  let Fields = {
    password: '',
    confirmPassword: '',
  };

  for (const field of requiredFields) {
    field.addEventListener('invalid', (event) => {
      // Block the default popup
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }

  function validateConfirmPassword(fields) {
    const spanError = elConfirmPassword.parentNode.querySelector('span.invalid-feedback');
    let passwordsMatch = false;

    if (fields.password === fields.confirmPassword) {
      spanError.innerHTML = '';
      elConfirmPassword.classList.remove('is-invalid');
      elConfirmPassword.classList.add('is-valid');
      passwordsMatch = true;
    } else {
      spanError.innerHTML = 'The passwords must be equals!';
      elConfirmPassword.classList.add('is-invalid');
      passwordsMatch = false;
    }

    return passwordsMatch;
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    Fields.password = elPassword.value;
    Fields.confirmPassword = elConfirmPassword.value;

    if (validateConfirmPassword(Fields)) {
      elForm.submit();
    }
  });
});
