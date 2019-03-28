const open = document.querySelector('.sidebar-open');
const sidebar = document.querySelector('.woo-sidebar');
const close = document.querySelector('.sidebar-close');

export default () => {
  if (!sidebar) return;
  open.addEventListener('click', function() {
    sidebar.classList.add('open');
  });
  close.addEventListener('click', function() {
    sidebar.classList.remove('open');
  });
};
