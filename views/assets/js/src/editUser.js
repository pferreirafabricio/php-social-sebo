/* eslint-disable dot-notation */
/* eslint-disable no-restricted-syntax */
import {
  customValidation,
} from './index.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmEdit'];
  const requiredFields = document.querySelectorAll('[required]');

  for (const field of requiredFields) {
    field.addEventListener('invalid', (event) => {
      // Block the default popup
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();
  });
});
