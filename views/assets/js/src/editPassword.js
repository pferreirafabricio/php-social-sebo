/* eslint-disable dot-notation */
/* eslint-disable no-restricted-syntax */
import {
  validateFields,
} from './index.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmPasswordEdit'];
  const elPassword = elForm['password'];
  const elConfirmPassword = elForm['confirmPassword'];

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // if (elPassword.value.length > 0) {
    //   validateFields(elPassword)();
    // }

    // // TODO:: Add condition for submit the form
    // elForm.submit();
  });
});
