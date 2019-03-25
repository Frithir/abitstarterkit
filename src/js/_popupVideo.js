import plyr from 'plyr'
import { iconUrl } from './_video'

const popupClassName = 'video-popup-content'

export default () => {

  const popupButtons = [...document.querySelectorAll('.popup')]
  if (!popupButtons) return

  const addListeners = (popupElement) => {
    window.addEventListener('keydown', removeVideo)
    popupElement.addEventListener('click', removeVideo)
  }

  const removeVideo = (e) => {
    if (e.type === 'click' && !e.target.classList.contains(popupClassName)) return
    if (e.type === 'keydown' && e.key !== 'Escape') return
    const popupElement = document.querySelector(`.${popupClassName}`)
    popupElement.remove()
    window.removeEventListener('keydown', removeVideo)
  }

  const openPopup = function(e) {
    e.preventDefault()

    const html = `
      <div class="container">
        <div data-type="youtube" data-video-id="${this.dataset.videoid}"></div>
      </div>
    `

    const popup = document.createElement('div')
    popup.classList.add(popupClassName)
    popup.innerHTML = html

    document.body.appendChild(popup)
    plyr.setup(popup, {
      iconUrl
    })

    addListeners(popup)
  }

  popupButtons.forEach(btn => btn.addEventListener('click', openPopup))

}
