import plyr from 'plyr'
export const iconUrl = '/wp-content/themes/homebasedsalons/images/plyr.svg'

export default () => {

  const bgVideo = plyr.setup('.bg-video', {
    iconUrl,
    autoplay: true,
    hideControls: true
  })
  bgVideo.muted= true

}
