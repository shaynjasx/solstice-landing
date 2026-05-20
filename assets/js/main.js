// VIDEO CONTROLS
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


// CONTACT FORM AJAX
const contactForm = document.getElementById('contactForm');
const formMessage = document.getElementById('formMessage');

if (contactForm) {

    contactForm.addEventListener('submit', async function (e) {

        e.preventDefault();

        const formData = new FormData(contactForm);

        try {

            const response = await fetch('form-handler.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.text();

            formMessage.innerHTML = `
                <div class="alert alert-success mt-3">
                    ${result}
                </div>
            `;

            contactForm.reset();

        } catch (error) {

            formMessage.innerHTML = `
                <div class="alert alert-danger mt-3">
                    Something went wrong. Please try again.
                </div>
            `;
        }
    });
}