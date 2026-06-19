			</div>
		</div>
	</div>
	<div id="scroll-indicator">
		<div id="scroll-indicator__bar" class="prevent-select" style="transform: translate3d(0px, 0px, 0px); opacity: 1; cursor: pointer;">
			<div id="scroll-indicator__bar-inner">
				<div id="scroll-indicator__bar-dot"></div>
				<div id="scroll-indicator__bar-text">Oryzo-1 Model</div>
			</div>
		</div>
	</div>
	<div id="preloader" style="display: none;">
		<canvas id="preloader-canvas" width="1401" height="55"></canvas>
	</div>
</div>
<div id="video-overlay" style="opacity: 0; display: none;">
	<div id="video-overlay__inner">
		<span class="video-overlay__glow"></span>
		<span class="video-overlay__border"></span>
		<div id="video-overlay__vimeo-video" style="pointer-events: none;" data-vimeo-initialized="true">
			<div style="padding:56.25% 0 0 0;position:relative;">
				<iframe src="https://player.vimeo.com/video/1174820580?h=5aaa6219d2&amp;title=0&amp;byline=0&amp;controls=0&amp;dnt=1&amp;app_id=122963" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Oryzo AI Founder Video" data-ready="true"></iframe>
			</div>
		</div>
		<div id="video-overlay__controls">
			<button id="video-overlay__mute-btn">
				<svg id="video-overlay__mute-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
					<path fill="currentColor" d="M3 9v6h4l5 5V4L7 9H3Zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02ZM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77Z"></path>
				</svg>
				<svg id="video-overlay__unmute-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
					<path fill="currentColor" d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63Zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51A8.796 8.796 0 0 0 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71ZM4.27 3 3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06a8.99 8.99 0 0 0 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3ZM12 4 9.91 6.09 12 8.18V4Z"></path>
				</svg>
			</button>
		</div>
	</div>
	<button id="video-overlay__mobile-close-btn">
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M3.75781 3.75732L12.2431 12.2426" stroke="white" stroke-width="2" stroke-linecap="round"></path>
			<path d="M12.2422 3.75732L3.75691 12.2426" stroke="white" stroke-width="2" stroke-linecap="round"></path>
		</svg>
	</button>
	<div id="video-overlay-cursor">
		<svg id="video-overlay-cursor__play" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
			<path fill="currentColor" d="M8 5.14v13.72a1 1 0 0 0 1.5.86l11.17-6.86a1 1 0 0 0 0-1.72L9.5 4.28a1 1 0 0 0-1.5.86Z"></path>
		</svg>
		<svg id="video-overlay-cursor__pause" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
			<path fill="currentColor" d="M6 4h4v16H6V4Zm8 0h4v16h-4V4Z"></path>
		</svg>
		<svg id="video-overlay-cursor__close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
			<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 6l12 12M18 6L6 18"></path>
		</svg>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
