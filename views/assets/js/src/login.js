/* eslint-disable no-restricted-syntax */
import {
  customValidation,
} from './index.js';

document.addEventListener('DOMContentLoaded', () => {
  const fields = document.querySelectorAll('[required]');

  for (const field of fields) {
    field.addEventListener('invalid', (event) => {
      // Block the default popup
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }
});
