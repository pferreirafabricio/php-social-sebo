/* eslint-disable no-restricted-syntax */

function countCharacters(element, feedbackElementId, maxCharacters) {
  const availableCharacters = maxCharacters - element.value.length;
  const feedbackElement = document.getElementById(feedbackElementId);

  feedbackElement.innerHTML = `${availableCharacters} characters available`;
}

document.addEventListener('DOMContentLoaded', () => {
  const baseURL = document.getElementById('baseUrl').value;
  const elForm = document.forms.frmCommentBook;
  const elComment = elForm.comment;
  const elBookId = document.getElementById('bookId');
  const elBtnComment = elForm.btnComment;
  const spanError = elComment.parentNode.querySelector('span.invalid-feedback');
  const commentData = {
    bookId: null,
    comment: null,
  };

  function createCommentsElements(comments) {
    const elBookComments = document.getElementById('bookComments');
    elBookComments.innerHTML = '';

    if (comments.length > 0) {
      const h3Comment = document.createElement('h3');
      h3Comment.classList.add('my-3');
      h3Comment.innerHTML = 'Comments';

      elBookComments.appendChild(h3Comment);
    }

    for (const comment of comments) {
      const divComment = document.createElement('div');
      divComment.classList.add('jumbotron', 'p-1', 'px-2');

      const pUserName = document.createElement('p');
      pUserName.classList.add('font-weight-bold', 'text-danger');

      const pComment = document.createElement('p');

      pUserName.innerHTML = comment.userName;
      pComment.innerHTML = comment.comment;

      divComment.appendChild(pUserName);
      divComment.appendChild(pComment);

      elBookComments.appendChild(divComment);
    }
  }

  async function getAllBookComments(bookId) {
    const response = await fetch(`${baseURL}comment/getBookComments/${bookId}`, {
      method: 'GET',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
    });

    const comments = await response.json();

    createCommentsElements(comments);
  }

  getAllBookComments(elBookId.value);

  function validateData(fields) {
    if (fields.comment.length < 10
      || fields.comment.length > 500
      || fields.comment === null) {
      spanError.innerHTML = 'Please, type a comment between 10 and 500 characters!';
      elComment.classList.add('is-invalid');
      return false;
    }

    if (fields.bookId <= 0 || fields.bookId === null) {
      spanError.innerHTML = 'The book id is invalid!';
      elComment.classList.add('is-invalid');
      return false;
    }

    return true;
  }

  async function insertComment(fields) {
    elComment.value = '';
    elBtnComment.disabled = true;
    spanError.innerHTML = 'Registering your comment!';

    const response = await fetch(`${baseURL}comment/insert`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(fields),
    });

    const data = await response.json();

    if (typeof data.code !== 'undefined' && data.code === 1) {
      elComment.classList.remove('is-invalid');
      elComment.classList.add('is-valid');
      spanError.innerHTML = data.message;
      getAllBookComments(elBookId.value);
    }

    if (typeof data.code !== 'undefined' && data.code === 2) {
      spanError.innerHTML = data.message;
    }

    elBtnComment.disabled = false;
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();

    commentData.bookId = elBookId.value;
    commentData.comment = elComment.value;

    if (validateData(commentData)) {
      insertComment(commentData);
    }
  });
});
