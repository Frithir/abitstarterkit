
export default () => {

  const header = document.querySelector('.header')
  if (!header) return

  function add_class_on_scroll() {
    header.classList.add('fade-in')
  }
  function remove_class_on_scroll() {
    header.classList.remove('fade-in')
  }
  window.addEventListener('scroll', function(){
    let scrollpos = window.scrollY
    if(scrollpos > 1){
      add_class_on_scroll()
    }
    else {
      remove_class_on_scroll()
    }

  })

}
