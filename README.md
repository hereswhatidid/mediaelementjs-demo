MediaElement.js Demo
===================

Plugin site: http://mediaelementjs.com/

#### Shortcodes
* **[video]**
  - **Attributes**
        * **src** - *(string)* - SRC of the video to be shown
        * **poster** - *(string)* - Placeholder image
        * **loop** - *(string)* - Loop playback
        * **autoplay** - *(string)* - Automatically start playback
        * **preload** - *(string)* - Preload video
        * **height** - *(string)* - Video height
        * **width** - *(string)* - Video width
* **[audio]**
  - **Attributes**
        * **src** - *(string)* - SRC of the video to be shown
        * **loop** - *(string)* - Loop playback
        * **autoplay** - *(string)* - Automatically start playback
        * **preload** - *(string)* - Preload video

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
  - **Return** - *(string)* - HTML content to display video
* wp_audio_shortcode( $atts )) - Implements the functionality of the Audio Shortcode
  - **$attrs** - *(array)*
        * **src** - *(string)* - SRC of the audio to be shown
        * **loop** - *(string)* - Loop playback
        * **autoplay** - *(string)* - Automatically start playback
        * **preload** - *(string)* - Preload audio
  - **Return** - *(string)* - HTML content to display audio
* get_attached_media( $type, $post_id ) - Retrieve media attached to the passed post.
  - **$type** - *(string)* - Mime type of media to retrieve
  - **$post_id** - *(integer)* - Post ID, default is current post ID
  - **Return** - *(array)* - WP_Post objects of found attachments
* wp_read_video_metadata( $file ) - Retrieve metadata from a video file's ID3 tags.
  - **file** - *(string)* - Path to file
* wp_read_audio_metadata( $file ) - Retrieve metadata from a audio file's ID3 tags.
  - **file** - *(string)* - Path to file
* wp_get_video_extensions() - Return a filtered list of WP-supported video formats
* wp_get_audio_extensions() - Return a filtered list of WP-supported audio formats

#### Notable WordPress Filters

* **wp_video_shortcode_handler** - Runs on the rendered video shortcode output
* **wp_audio_shortcode_handler** - Runs on the rendered audio shortcode output
* **wp_video_extensions** - Used to modify the accepted video mime types
  - *Default* - array( 'mp4', 'm4v', 'webm', 'ogv', 'wmv', 'flv' )
* **wp_audio_extensions** - Used to modify the accepted video mime types
  - *Default* - array( 'mp3', 'ogg', 'wma', 'm4a', 'wav' )
