(function ($) {
	"use strict";
	$(function () {
		var $mediaPlayers = $('.mejs-video');

		$mediaPlayers.each( function() {
			var playerId = $(this).attr( 'id' ),
				curPlayer = mejs.players[playerId];

			var propertyButtons = '<div class="property-buttons" data-mediaplayerid="' + playerId + '">';
			propertyButtons += '<h4>Properties</h4>';
			propertyButtons += '<button data-command="paused">Paused</button>';
			propertyButtons += '<button data-command="ended">Ended</button>';
			propertyButtons += '<button data-command="seeking">Seeking</button>';
			propertyButtons += '<button data-command="duration">Duration</button>';
			propertyButtons += '<button data-command="muted">Muted</button>';
			propertyButtons += '<button data-command="volume">Volume</button>';
			propertyButtons += '<button data-command="currentTime">Current Time</button>';
			propertyButtons += '<button data-command="src">SRC</button>';
			propertyButtons += '</div>';

			var methodButtons = '<div class="method-buttons" data-mediaplayerid="' + playerId + '">';
			methodButtons += '<h4>Methods</h4>';
			methodButtons += '<button data-command="play">Play</button>';
			methodButtons += '<button data-command="pause">Pause</button>';
			methodButtons += '<button data-command="load">Load</button>';
			methodButtons += '<button data-command="stop">Stop</button>';
			methodButtons += '<button data-command="mute">Mute</button>';
			methodButtons += '<button data-command="setvolumn50">Set Volume 50%</button>';
			methodButtons += '<button data-command="setvolume100">Set Volume 100%</button>';
			methodButtons += '<button data-command="settime">Set Time to 120 Seconds</button>';
			methodButtons += '</div>';

			$( propertyButtons + methodButtons )
					.insertAfter( $(this) );


			curPlayer.options.success = function( mediaElement, domObject, mediaElementPlayer ) {
				// console.log( 'Media Element: ', mediaElement );
				// console.log( 'DOM Object: ', domObject );
				// console.log( 'Media Element Player: ', mediaElementPlayer );

				var playerMedia = mediaElementPlayer.media;

				playerMedia
						.addEventListener( 'success', function() {
							console.log( 'Success!' );
						});

				playerMedia
						.addEventListener( 'loadeddata', function() {
							console.log( 'Loaded data!' );
						});
				playerMedia
						.addEventListener( 'progress', function() {
							console.log( 'Progress!' );
						});
				playerMedia
						.addEventListener( 'timeupdate', function() {
							console.log( 'Time update!' );
						});
				playerMedia
						.addEventListener( 'seeked', function() {
							console.log( 'Seeked!' );
						});
				playerMedia
						.addEventListener( 'canplay', function() {
							console.log( 'Can play!' );
						});
				playerMedia
						.addEventListener( 'play', function() {
							console.log( 'Play!' );
						});
				playerMedia
						.addEventListener( 'playing', function() {
							console.log( 'Playing!' );
						});
				playerMedia
						.addEventListener( 'pause', function() {
							console.log( 'Pause!' );
						});
				playerMedia
						.addEventListener( 'loadedmetadata', function() {
							console.log( 'Loaded metadata!' );
						});
				playerMedia
						.addEventListener( 'ended', function() {
							console.log( 'Ended!' );
						});
				playerMedia
						.addEventListener( 'volumechange', function() {
							console.log( 'Volume change!' );
						});
			}

		} );

		$( '.property-buttons' )
				.on( 'click', 'button', function() {
					var playerid = $(this).closest('.property-buttons').data('mediaplayerid'),
							mediaObject = mejs.players[playerid].media,
							command = $(this).data('command');

					switch( command ) {
						case 'paused':
							console.log( 'Paused: ', mediaObject.paused );
							break;
						case 'ended':
							console.log( 'Ended: ', mediaObject.ended );
							break;
						case 'seeking':
							console.log( 'Seeking: ', mediaObject.seeking );
							break;
						case 'duration':
							console.log( 'Duration: ', mediaObject.duration );
							break;
						case 'muted':
							console.log( 'Muted: ', mediaObject.muted );
							break;
						case 'volume':
							console.log( 'Volume: ', mediaObject.volume );
							break;
						case 'currentTime':
							console.log( 'Current Time: ', mediaObject.currentTime );
							break;
						case 'src':
							console.log( 'SRC: ', mediaObject.src );
							break;
					}
				});

		$( '.method-buttons' )
				.on( 'click', 'button', function() {
					var playerid = $(this).closest('.method-buttons').data('mediaplayerid'),
							mediaObject = mejs.players[playerid],
							command = $(this).data('command');

					switch( command ) {
						case 'play':
							mediaObject.play();
							break;
						case 'pause':
							mediaObject.pause();
							break;
						case 'load':
							mediaObject.load();
							break;
						case 'stop':
							mediaObject.stop();
							break;
						case 'mute':
							mediaObject.media.setMuted( ! mediaObject.media.muted );
							break;
						case 'setvolumn50':
							mediaObject.media.setVolume( 0.5 );
							break;
						case 'setvolume100':
							mediaObject.media.setVolume( 1 );
							break;
						case 'settime':
							mediaObject.media.setCurrentTime( 120 );
							break;
					}
				});
	});
}(jQuery));