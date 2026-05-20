// ================================
// VIDEO PLAYER
// ================================
function playVideo() {
    const video = document.getElementById('mainVideo');
    const overlay = document.getElementById('videoOverlay');
    
    if (video.paused) {
        video.play();
        overlay.style.display = 'none';
    } else {
        video.pause();
        overlay.style.display = 'flex';
    }
}

// Click on video to pause
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('mainVideo');
    
    video.addEventListener('click', function() {
        if (!video.paused) {
            video.pause();
            document.getElementById('videoOverlay').style.display = 'flex';
        }
    });
});