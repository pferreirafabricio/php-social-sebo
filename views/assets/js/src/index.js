/* eslint-disable no-restricted-syntax */
import {
  validateEmail,
  validatePassword,
  validateName,
} from './validations.js';

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
      } else if (field.type === 'text' && !validateName(field.value)) {
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
      text: {
        valueMissing: 'Please, fill the name field',
        typeMismatch: 'Please, type a valid name',
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

export {
  validateFields,
  customValidation,
};
