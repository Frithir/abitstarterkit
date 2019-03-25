const popupClassName = 'popup-content'

export default () => {

  const popupButtons = [...document.querySelectorAll('.popup')]
  if (!popupButtons) return

  const addListeners = (popupElement) => {
    window.addEventListener('keydown', removePopup)
    popupElement.addEventListener('click', removePopup)
  }

  const removePopup = (e) => {
    if (e.type === 'click' && !e.target.classList.contains(popupClassName)) return
    if (e.type === 'keydown' && e.key !== 'Escape') return
    const popupElement = document.querySelector(`.${popupClassName}`)
    popupElement.remove()
    window.removeEventListener('keydown', removePopup)
    document.body.classList.remove('popup-open')
  }

  const openPopup = function(e) {
    e.preventDefault()
    const html = `
      <div class="popup-content container">
        <img src="${this.href}" />
      </div>
    `
    const popup = document.createElement('div')
    popup.classList.add(popupClassName)
    popup.innerHTML = html
    document.body.appendChild(popup)
    document.body.classList.add('popup-open')
    addListeners(popup)
  }

  popupButtons.forEach(btn => btn.addEventListener('click', openPopup))

}
