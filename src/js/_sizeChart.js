export default () => {

  let accordion = document.querySelector('.accordion')
  if (!accordion) return

  accordion.addEventListener('click', function () {
    if (accordion)
      accordion.classList.toggle('open')
  }, false)

}
