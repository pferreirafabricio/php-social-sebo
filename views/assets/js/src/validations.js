/* eslint-disable no-useless-escape */
const emailRegex = /^([a-zA-Z0-9\.\+\-\_]{5,60})\@([a-zA-Z0-9\.\+\-\_]{2,10})\.([a-zA-Z0-9]{2,10}).+$/;
const passwordRegex = /([a-zA-Z0-9]){2,60}/;
const nameRegex = /([a-zA-Z]){2,60}/;
const defaultAcceptedFilesTypes = [
  'image/jpg',
  'image/jpeg',
  'image/png',
  'image/gif',
];

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

function validateFiles(
  files,
  maxNumberOfFiles = 1,
  acceptedFilesTypes = defaultAcceptedFilesTypes,
  maxSizeFile = 5242880,
) {
  function validateFileType(image) {
    if (!acceptedFilesTypes.includes(image.type)) {
      return false;
    }

    return true;
  }

  function validateFileSize(image) {
    if (!(image.size <= maxSizeFile)) {
      return false;
    }

    return true;
  }

  if (files.length === 0) {
    return false;
  }

  if (files.length > maxNumberOfFiles) {
    return false;
  }

  // eslint-disable-next-line no-restricted-syntax
  for (let image of files) {
    if (!validateFileType(image) || !validateFileSize(image)) {
      return false;
    }
  }

  return true;
}

export {
  validateEmail,
  validatePassword,
  validateName,
  validateFiles,
};
