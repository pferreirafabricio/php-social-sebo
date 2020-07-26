/* eslint-disable no-restricted-syntax */
import {
  validateEmail,
  validatePassword,
} from './validations.js';

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms.frmLogin;
  const fields = document.querySelectorAll('[required]');

  function validateFields(field) {
    function verifyErrors() {
      let foundErrors = false;

      for (const error in field.validity) {
        if (field.validity[error] && !field.validity.valid) {
          foundErrors = error;
        }
      }

      if (!foundErrors) {
        if (field.type === 'password' && !validatePassword(field.value)) {
          foundErrors = 'typeMismatch';
        } else if (field.type === 'email' && !validateEmail(field.value)) {
          foundErrors = 'typeMismatch';
        }
      }

      return foundErrors;
    }

    function customMessage(typeError) {
      const messages = {
        password: {
          valueMissing: 'Please, fill the password field',
          typeMismatch: 'Please, type a valid password',
        },
        email: {
          valueMissing: 'Please, fill the email field',
          typeMismatch: 'Please, type a valid email',
        },
      };

      return messages[field.type][typeError];
    }

    function setCustomMessage(message) {
      const spanError = field.parentNode.querySelector('span.invalid-feedback');

      if (message) {
        spanError.innerHTML = message;
        field.classList.add('is-invalid');
      } else {
        spanError.innerHTML = '';
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
      }
    }

    return () => {
      const error = verifyErrors();

      if (error) {
        const message = customMessage(error);
        setCustomMessage(message);
      } else {
        setCustomMessage();
      }
    };
  }

  function customValidation(event) {
    const field = event.target;

    const validation = validateFields(field);
    validation();
  }

  for (const field of fields) {
    field.addEventListener('invalid', (event) => {
      // Block the default popup
      event.preventDefault();
      customValidation(event);
    });

    field.addEventListener('blur', customValidation);
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();
    console.log('Pronto pro submit');
  });
});
