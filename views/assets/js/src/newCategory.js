/* eslint-disable no-restricted-syntax */
import {
  customValidation,
} from './index.min.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmRegisterCategory'];
  const requiredFields = document.querySelectorAll('[required]');

  for (const field of requiredFields) {
    field.addEventListener('invalid', (event) => {
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }
});
