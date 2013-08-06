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

#### Output HTML

`<div style="width: 240px; max-width: 100%;">
    <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
    <div id="mep_0" class="mejs-container svg wp-video-shortcode mejs-video" style="width: 240px; height: 176px;">
        <div class="mejs-inner">
            <div class="mejs-mediaelement">
                <div class="me-plugin" id="me_flash_0_container">
                    <embed id="me_flash_0" name="me_flash_0" play="true" loop="false" quality="high" bgcolor="#000000" wmode="transparent" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="//www.macromedia.com/go/getflashplayer" src="/wp-includes/js/mediaelement/flashmediaelement.swf" flashvars="id=me_flash_0&amp;isvideo=true&amp;autoplay=false&amp;preload=metadata&amp;width=240&amp;startvolume=0.8&amp;timerrate=250&amp;flashstreamer=&amp;height=176&amp;pseudostreamstart=start&amp;file=http%3A%2F%2Fhereswhatidid.com%2Fmedia%2FAdventure.time_.with_.finn_.and_.jake_.s01e00.pilot-1.m4v" width="240" height="176" class="mejs-shim">
                </div>
                <video class="wp-video-shortcode" id="video-453-1" width="240" height="176" preload="metadata" style="display: none;"><source type="video/m4v" src="http://hereswhatidid.com/media/Adventure.time_.with_.finn_.and_.jake_.s01e00.pilot-1.m4v"><a href="http://hereswhatidid.com/media/Adventure.time_.with_.finn_.and_.jake_.s01e00.pilot-1.m4v">http://hereswhatidid.com/media/Adventure.time_.with_.finn_.and_.jake_.s01e00.pilot-1.m4v</a></video>
            </div>
            <div class="mejs-layers">
                <div class="mejs-poster mejs-layer" style="display: none; width: 240px; height: 176px;"></div>
                <div class="mejs-overlay mejs-layer" style="width: 240px; height: 176px; display: none;">
                    <div class="mejs-overlay-loading"><span></span></div>
                </div>
                <div class="mejs-overlay mejs-layer" style="display: none; width: 240px; height: 176px;">
                    <div class="mejs-overlay-error"></div>
                </div>
                <div class="mejs-overlay mejs-layer mejs-overlay-play" style="width: 240px; height: 146px;">
                    <div class="mejs-overlay-button" style="margin-top: -35px;"></div>
                </div>
            </div>
            <div class="mejs-controls" style="display: block; visibility: hidden;">
                <div class="mejs-button mejs-playpause-button mejs-play">
                    <button type="button" aria-controls="mep_0" title="Play/Pause" aria-label="Play/Pause"></button>
                </div>
                <div class="mejs-time mejs-currenttime-container">
                    <span class="mejs-currenttime">00:00</span>
                </div>
                <div class="mejs-time-rail" style="width: 92px;">
                    <span class="mejs-time-total" style="width: 82px;">
                        <span class="mejs-time-buffering" style="display: none;"></span>
                        <span class="mejs-time-loaded" style="width: 71.28819084993972px;"></span>
                        <span class="mejs-time-current" style="width: 0px;"></span>
                        <span class="mejs-time-handle" style="left: -5px;"></span>
                        <span class="mejs-time-float">
                            <span class="mejs-time-float-current">00:00</span>
                            <span class="mejs-time-float-corner"></span>
                        </span>
                    </span>
                </div>
                <div class="mejs-time mejs-duration-container">
                    <span class="mejs-duration">06:52</span>
                </div>
                <div class="mejs-button mejs-volume-button mejs-mute">
                    <button type="button" aria-controls="mep_0" title="Mute Toggle" aria-label="Mute Toggle"></button>
                    <div class="mejs-volume-slider" style="display: none;">
                        <div class="mejs-volume-total"></div>
                        <div class="mejs-volume-current" style="height: 80px; top: 28px;"></div>
                        <div class="mejs-volume-handle" style="top: 25px;"></div>
                    </div>
                </div>
                <div class="mejs-button mejs-fullscreen-button">
                    <button type="button" aria-controls="mep_0" title="Fullscreen" aria-label="Fullscreen"></button>
                </div>
            </div>
            <div class="mejs-clear"></div>
        </div>
        <div class="mejs-fullscreen-hover" style="display: none;"></div>
        <div class="mejs-fullscreen-hover" style="display: none;"></div>
        <div class="mejs-fullscreen-hover" style="display: none;"></div>
        <div class="mejs-fullscreen-hover" style="display: none;"></div>
    </div>
</div>`
