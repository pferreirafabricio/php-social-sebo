/* eslint-disable dot-notation */
/* eslint-disable no-restricted-syntax */
import {
  validateFields,
} from './index.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmEdit'];
  const elName = elForm['name'];
  const elEmail = elForm['email'];
  const elPassword = elForm['password'];

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    validateFields(elName)();
    validateFields(elEmail)();

    if (elPassword.value.length > 0) {
      validateFields(elPassword)();
    }

    // TODO:: Add condition for submit the form
    elForm.submit();
  });
});
