// ================================
// VIDEO CONTROLS
// ================================
function playVideo() {
    const video = document.getElementById('mainVideo');
    const overlay = document.getElementById('videoOverlay');
    video.play();
    overlay.style.display = 'none';
}

const video = document.getElementById('mainVideo');

if (video) {
    video.addEventListener('click', function () {
        if (!video.paused) {
            video.pause();
            document.getElementById('videoOverlay').style.display = 'flex';
        } else {
            video.play();
            document.getElementById('videoOverlay').style.display = 'none';
        }
    });
}

// ================================
// CONTACT FORM
// ================================
const contactForm = document.getElementById('contactForm');
const formMessage = document.getElementById('formMessage');

if (contactForm) {
    contactForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(contactForm);
        const isLocal = window.location.hostname === 'localhost';
        const formAction = isLocal
            ? 'api/form-handler.php'
            : 'https://formspree.io/f/xzdweakb';

        try {
            const response = await fetch(formAction, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json' }
            });

            const result = await response.json();

            if (result.success || result.ok) {
                formMessage.innerHTML = `
                    <div class="alert alert-success mt-3 text-center">
                        Thank you! Your inquiry has been submitted.
                    </div>
                `;
                contactForm.reset();
            } else {
                formMessage.innerHTML = `
                    <div class="alert alert-danger mt-3 text-center">
                        ${result.message || result.error || 'Something went wrong. Please try again.'}
                    </div>
                `;
            }

        } catch (error) {
            formMessage.innerHTML = `
                <div class="alert alert-danger mt-3">
                    Something went wrong. Please try again.
                </div>
            `;
        }
    });
}