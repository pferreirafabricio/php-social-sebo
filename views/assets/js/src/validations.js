/* eslint-disable no-useless-escape */
const emailRegex = /^([a-zA-Z0-9\.\+\-\_]{5,60})\@([a-zA-Z0-9\.\+\-\_]{2,10})\.([a-zA-Z0-9]{2,10}).+$/;
const passwordRegex = /([a-zA-Z0-9]){2,60}/;
const nameRegex = /([a-zA-Z]){2,60}/;

function validateEmail(email) {
  return (
    emailRegex.test(email)
    && email.length <= 100
    && email.length >= 9);
}

function validatePassword(password) {
  return (
    passwordRegex.test(password)
    && password.length < 60
    && password.length > 4);
}

function validateName(name) {
  return (
    nameRegex.test(name)
    && name.length < 60
    && name.length > 2);
}

export {
  validateEmail,
  validatePassword,
  validateName,
};
