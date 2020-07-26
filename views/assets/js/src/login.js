/* eslint-disable prefer-arrow-callback */
/* eslint-disable func-names */
document.addEventListener('DOMContentLoaded', function () {
  const elForm = document.forms.frmLogin;
  const elEmail = elForm.email;
  const elPassword = elForm.password;

  let Fields = {
    email: '',
    password: '',
  };

  function validateLogin(pFields) {
    if (!validateEmail(pFields.email)) {
      elEmail.classList.add('is-invalid');
    } else {
      elEmail.classList.remove('is-invalid');
      elEmail.classList.add('is-valid');
    }
  }

  elForm.addEventListener('submit', function (event) {
    event.preventDefault();
    Fields.email = elEmail.value;
    Fields.password = elPassword.value;

    if (validateLogin(Fields)) {
      console.log('Submit form');
    }
  });
});
