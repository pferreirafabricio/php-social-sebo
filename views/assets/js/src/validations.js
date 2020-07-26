/* eslint-disable no-useless-escape */
const emailRegex = /^([a-zA-Z0-9\.\+\-\_]{5,60})\@([a-zA-Z0-9\.\+\-\_]{2,10})\.([a-zA-Z0-9]{2,10}).+$/;
const nameRegex = /([a-zA-Z]){2,60}/;
const passwordRegex = /([a-zA-Z]){2,60}/;
const telephoneRegex = /(\([1-9][1-9]{1}\))([\d\s\-?]{8,11})/;

function validateEmail(email) {
  console.log(email);
  return emailRegex.test(email);
}

function validatePassword(password) {
  return passwordRegex.test(password);
}

export { validateEmail, validatePassword };
