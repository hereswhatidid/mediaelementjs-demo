MediaElement.js Demo
===================

Plugin site: http://mediaelementjs.com/

#### Enqueued JS and CSS

* **CSS** - *mediaelement*
  - File Path: */wp-includes/js/mediaelement/wp-mediaelement.css*
* **CSS** - *wp-mediaelement*
  - Dependencies: *mediaelement*
  - File Path: */wp-includes/js/mediaelement/mediaelementplayer.min.css*
* **JS** - *mediaelement*
  - File Path: */wp-includes/js/mediaelement/wp-mediaelement.js*
* **JS** - *wp-mediaelement*
  - Dependencies: *mediaelement*
  - File Path: */wp-includes/js/mediaelement/wp-mediaelement.js*

#### JavaScript Properties

* paused (get)
* ended (get)
* seeking (get)
* duration (get)
* muted (get), setMuted()
* volume (get), setVolume()
* currentTime (get), setCurrentTime()
* src (get), setSrc()

#### JavaScript Methods

* play()
* pause()
* load()
* stop()

#### JavaScript Events

* loadeddata
* progress
* timeupdate
* seeked
* canplay
* play
* playing
* pause
* loadedmetadata
* ended
* volumechange

#### Notable WordPress Functions

* wp_video_shortcode( $atts )) - Implements the functionality of the Video Shortcode
  - **$attrs** - *(array)*
        * **src** - *(string)* - SRC of the video to be shown
        * **poster** - *(string)* - Placeholder image
        * **loop** - *(string)* - Loop playback
        * **autoplay** - *(string)* - Automatically start playback
        * **preload** - *(string)* - Preload video
        * **height** - *(string)* - Video height
        * **width** - *(string)* - Video width
