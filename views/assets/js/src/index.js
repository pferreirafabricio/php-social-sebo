/* eslint-disable no-restricted-syntax */
import {
  validateEmail,
  validatePassword,
  validateName,
  validateFiles,
} from './validations.min.js';

function validateFields(field) {
  console.log(field.files);
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
      } else if (field.type === 'file' && !validateFiles(field.files)) {
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
        valueMissing: 'This field is required',
        typeMismatch: 'Please, type a valid name',
      },
      number: {
        valueMissing: 'This field is required',
        typeMismatch: 'Please, type a valid number',
      },
      select: {
        valueMissing: 'Please, select a value',
        typeMismatch: 'Please, select a valid value',
      },
      file: {
        valueMissing: 'Please, select a file',
        typeMismatch: 'Please, select a valid file',
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
      return false;
    }

    setCustomMessage();
    return true;
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
