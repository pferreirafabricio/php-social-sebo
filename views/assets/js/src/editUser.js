/* eslint-disable dot-notation */
/* eslint-disable no-restricted-syntax */
import {
  validateFields,
} from './index.min.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmEdit'];
  const elName = elForm['name'];
  const elEmail = elForm['email'];

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    if (validateFields(elName)() && validateFields(elEmail)()) {
      elForm.submit();
    }
  });
});
