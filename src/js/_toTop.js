import MoveTo from 'moveto'

export default () => {

  const moveTo = new MoveTo()
  const footerLogo = document.querySelector('footer .logo')
  footerLogo.addEventListener('click', function(event) {
    event.preventDefault()
    moveTo.move(0)
  })

}
