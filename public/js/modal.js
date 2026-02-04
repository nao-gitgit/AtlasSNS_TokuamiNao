const editBtns = document.querySelectorAll('.edit-btn');
const modal = document.getElementById('edit-modal');
const postContent = document.getElementById('edit-post-content');
const postId = document.getElementById('edit-post-id');

editBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    postContent.value = btn.dataset.post;
    postId.value = btn.dataset.id;
    modal.style.display = 'block';
  });
});
