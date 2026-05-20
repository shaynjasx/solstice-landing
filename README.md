# Solstice Landing Page — Project Report

**Submitted by:** Shayna Goles

**Project:** Resource Test — Shayna G.

**Deadline:** May 24, 2026 | 2:00 PM Eastern Time

---

## Approach & Order of Work
- Reviewed the Figma mockup thoroughly before writing any code.
- Set up project folder structure (HTML, SCSS, JS and assets).
- Built HTML structure section by section using semantic markup.
- Styled with SCSS using Bootstrap as the base framework and custom variables.
- Added responsive breakpoints for tablet and mobile views and tested across sizes.
- Designed and built the contact form section (not in mockup) and wired server-side validation.
- Implemented the 3-column collections layout revision and added a third collection matching the existing style.
- Connected PHP form handling with PHPMailer wiring (SMTP placeholders) and a local fallback.
- Pushed code to GitHub and deployed to Netlify (links below).
- Final review and testing across screen sizes.

---

## AI Usage
- Used AI to help scaffold the initial SCSS variables and folder structure.
- Used AI to explain Bootstrap grid syntax and SCSS nesting concepts.
- Used AI to assist with example PHP/PHPMailer logic and configuration snippets.
- All layout decisions, visual matching, responsive breakpoints, and implementation were executed independently.

---

## Independent Decisions (examples)
1. Chose PHPMailer for SMTP delivery to provide reliable, configurable mail transport and easier debugging than `mail()`.
2. Implemented a local fallback that logs submissions to `submissions.log` when SMTP credentials are not provided, so the client can verify submissions during review.
3. Converted the collections section to a three-column layout and designed a third collection tile to visually match the two provided, maintaining typography and spacing consistent with the mockup.

---

## Design Revision — Collections to 3 Columns
I converted the collections area from a horizontal layout to a three-column grid using Bootstrap's responsive grid. A third collection tile was designed to match the existing two using the same card structure, typography, and spacing. On smaller viewports the layout collapses to two columns and then a single column for mobile to preserve readability and hierarchy.

---

## Contact Form Design Approach
- Placement: inserted between the "DOWNLOAD BROCHURE" button and the row of lifestyle images to maintain natural content flow.
- Fields: Full name, Email, Inquiry type (select), Message textarea, Submit button.
- Accessibility: used semantic form controls, `label` where appropriate, and native `required` attributes; ensured color contrast for success/error messaging.
- Responsiveness: form stacks on mobile, uses two-column layout on wider screens using Bootstrap classes.
- Server-side: `form-handler.php` performs server-side validation for required fields and email format and returns success or error via query parameters (`?success=1`, `?error=...`).
- Delivery: PHPMailer is integrated; actual SMTP is disabled by default (`emailEnabled = false`) because SMTP credentials were not provided by the client. When enabled, PHPMailer will send to the configured recipient.

---

## Exact changes in `index.php` and `scss/style.scss`


- `index.php`:
  - Added the contact form section between the "DOWNLOAD BROCHURE" CTA and the lifestyle image row.
  - Form fields: `fullName`, `email`, `inquiryType`, `message` with native `required` attributes.
  - Form `action` set to `form-handler.php` (server-side handler) and method `POST`.
  - Added success and error alert handling on the page that displays `?success=1` or `?error=...` states returned by the handler.

- `scss/style.scss`:
  - All page styles authored in `scss/style.scss` using SCSS variables and nested rules (Bootstrap used as base).
  - SCSS includes variables for typography and color palette and responsive rules for the hero, intro, collections, and contact form sections.
  - Project uses Live Sass (VS Code extension) to compile `scss/style.scss` to `scss/style.css` automatically; the site includes the compiled `scss/style.css` file.

- `form-handler.php` (server-side companion):
  - Performs server-side validation and redirects back to `index.php` with success/error query parameters.
  - PHPMailer integrated for SMTP sending (placeholders present). When SMTP credentials are not provided, a local fallback appends submissions to `submissions.log` so leads can still be verified during review.

These edits ensure the contact form is present, validated server-side, and visually consistent with the rest of the page while allowing the email transport to be configured later.

## Email sending (current state)
- PHPMailer is included and used in `form-handler.php`.
- By default `emailEnabled` is set to `false` and submissions are appended to `submissions.log` (project root).
- Placeholders to configure when SMTP details are provided:
  - `smtpHost`, `smtpPort`, `smtpUsername`, `smtpPassword`, `smtpSecure`, `fromEmail`, `fromName`.
- To enable real delivery: set `emailEnabled = true` and replace placeholders with the client's SMTP credentials.

---

## How to enable SMTP (examples)
**Mailtrap (recommended for testing)**
- Host: `smtp.mailtrap.io`
- Port: `2525` (or 465/587)
- Username / Password: from Mailtrap inbox credentials
- Update `form-handler.php` with credentials and set `emailEnabled = true`.

**Gmail (demo, requires app password if 2FA enabled)**
- Host: `smtp.gmail.com`
- Port: `587` (STARTTLS) or `465` (SSL)
- Username: your Gmail address
- Password: app password (recommended for accounts with 2FA)

**Hosting provider**
- If you use the client’s hosted domain email, check cPanel → Email Accounts → Connect Devices for SMTP settings.

---

## Local testing and verification
- If SMTP is not available, verify submissions in `submissions.log` at the project root. Each submission is appended with a timestamp and the message body.
- To test the endpoint locally using `curl`:

```bash
curl -X POST \
  -d "fullName=Test User" \
  -d "email=test@example.com" \
  -d "inquiryType=general" \
  -d "message=Hello" \
  http://localhost/solstice-landing/form-handler.php -v
```

- For a safer test inbox, create a Mailtrap account, grab the SMTP credentials, and enable SMTP in `form-handler.php`.

---

## Config snippet (copy into `form-handler.php`)
```php
$emailEnabled = true;
$smtpHost = 'smtp.mailtrap.io';
$smtpPort = 2525;
$smtpUsername = 'your_mailtrap_user';
$smtpPassword = 'your_mailtrap_pass';
$smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;
$fromEmail = 'noreply@yourdomain.com';
$fromName = 'Solstice Website';
```

---

## Where submissions are stored (fallback)
- File: `submissions.log` (project root). Use this during review to show proof of submissions when mail is not configured.

---

## Questions & How I Resolved Them
- Q1: No image or video assets provided or exportable from Figma.
  - Resolution: sourced visuals from Unsplash and Pexels that matched the mockup's aesthetic (ranch landscapes, home exteriors, lifestyle shots).
- Q2: SMTP / recipient email not provided by the client.
  - Resolution: integrated PHPMailer and documented how to configure SMTP; implemented a local log fallback so the client can verify submissions without mail transport.
- Q3: Unclear responsive specifics for the unmocked contact section.
  - Resolution: used Bootstrap responsive patterns and kept field order and spacing consistent with the mockup; tested breakpoints at common widths (desktop/tablet/mobile).

---

## Suggested report paragraphs 
**Approach:**
I implemented the responsive landing page using Bootstrap and SCSS, following the Figma mockup and interpreting the layout decisions required for smaller viewports. I added a contact form (not in the mockup) with server-side validation and integrated PHPMailer for SMTP delivery. When SMTP credentials are not available, submissions are recorded to `submissions.log` so the client can verify leads.

**AI usage:**
I used AI for scaffolding and guidance on SCSS structure and example PHP mailer configuration. All implementation, testing, and visual decisions were completed independently.

**Design revision & contact form:**
I converted the collections area to a responsive three-column layout and added a matching third collection card. The unmocked contact form was designed to fit the page’s visual rhythm, placed between the brochure CTA and lifestyle images, and implemented to match Bootstrap spacing and form controls.

**Assumptions & next steps:**
- SMTP credentials and a final recipient email must be provided to enable real email delivery. Once received, set `emailEnabled = true` and populate the SMTP fields in `form-handler.php`.

---

## Total Hours
- Replace this placeholder with your tracked hours: **05:51:12**

---

## GitHub Repository
- Add your repository link here: **(https://github.com/shaynjasx/solstice-landing/)**

## Live Preview Link
- Add your Netlify/Vercel live URL here: **[LIVE_PREVIEW_URL]**

---

## Final notes
- The contact form is fully functional server-side and returns clear success/error states to the user. Email sending is ready but requires SMTP credentials to be enabled; meanwhile, submissions are safely logged to `submissions.log` for review.


