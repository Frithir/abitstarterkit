import 'intersection-observer'

export default () => {
  const header = document.querySelector('.home-header')
  if (!header) return
  const homeTop = document.querySelector('.hometop')
  if (!homeTop) return
  homeTop.style.height = header.offsetHeight * 3 + 'px'
  homeTop.style.position = 'absolute'
  let observer
  const handleIntersect = entries => {
    entries.map(entry => {
      if (entry.isIntersecting) {
        header.classList.add('is-top')
        header.classList.remove('header')
      } else {
        header.classList.remove('is-top')
        header.classList.add('header')
      }
    })
  }
  observer = new IntersectionObserver(handleIntersect)
  observer.observe(homeTop)
}
