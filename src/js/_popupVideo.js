export default () => {
  const popupClassName = 'video-popup',
    popupButtons = [...document.querySelectorAll('.video-opener')]

  if (!popupButtons) return

  const addListeners = popupElement => {
      window.addEventListener('keydown', removeVideo)
      popupElement.addEventListener('click', removeVideo)
    },
    removeVideo = e => {
      if (
        e.type === 'click' &&
        !e.target.classList.contains(popupClassName) &&
        !e.target.classList.contains('close')
      )
        return
      if (e.type === 'keydown' && e.key !== 'Escape') return

      const popupElement = document.querySelector(`.${popupClassName}`)

      popupElement.classList.remove('active')

      setTimeout(() => {
        popupElement.remove()
        window.removeEventListener('keydown', removeVideo)
      }, 300)
    },
    openPopup = e => {
      e.preventDefault()

      const html = `
      <div class="close"></div>
      <video controls autoplay>
        <source src="${e.target.attributes.href.value}" type="video/mp4">
      </video>
    `,
        popup = document.createElement('div')

      popup.classList.add(popupClassName)
      popup.innerHTML = html

      document.body.appendChild(popup)

      setTimeout(() => {
        popup.classList.add('active')
      }, 300)

      addListeners(popup)
    }

  popupButtons.forEach(btn => btn.addEventListener('click', openPopup))
}
