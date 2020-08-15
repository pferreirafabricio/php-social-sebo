/* eslint-disable no-restricted-syntax */
import {
  customValidation,
} from './index.min.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmRegisterBook'];
  const elSelectCategory = elForm['category'];
  const elSelectStatus = elForm['status'];
  const elSynopsis = elForm['synopsis'];
  const requiredFields = document.querySelectorAll('[required]');

  function validateFields() {
    const categorySpanError = elSelectCategory.parentNode.querySelector('span.invalid-feedback');
    const statusSpanError = elSelectStatus.parentNode.querySelector('span.invalid-feedback');
    const synopsisSpanError = elSynopsis.parentNode.querySelector('span.invalid-feedback');
    let validData = false;

    if (elSelectStatus.value < 1 || elSelectStatus.value > 2) {
      statusSpanError.innerHTML = 'Select a value valid!';
      elSelectStatus.classList.add('is-invalid');
      validData = false;
    } else {
      statusSpanError.innerHTML = '';
      elSelectStatus.classList.remove('is-invalid');
      elSelectStatus.classList.add('is-valid');
      validData = true;
    }

    if (elSelectCategory.value < 1 || elSelectCategory.value === null) {
      categorySpanError.innerHTML = 'Select a value valid!';
      elSelectCategory.classList.add('is-invalid');
      validData = false;
    } else {
      categorySpanError.innerHTML = '';
      elSelectCategory.classList.remove('is-invalid');
      elSelectCategory.classList.add('is-valid');
      validData = true;
    }

    const synopsisData = CKEDITOR.instances['synopsis'].getData();

    if (synopsisData.length < 10) {
      synopsisSpanError.innerHTML = 'Type a valid synopsis!';
      elSynopsis.classList.add('is-invalid');
      validData = false;
    } else {
      synopsisSpanError.innerHTML = '';
      elSynopsis.classList.remove('is-invalid');
      elSynopsis.classList.add('is-valid');
      validData = true;
    }

    return validData;
  }

  for (const field of requiredFields) {
    field.addEventListener('invalid', (event) => {
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    if (validateFields()) {
      elForm.submit();
    }
  });
});
