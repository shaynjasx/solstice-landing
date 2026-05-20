# Solstice Landing Page — Project Report

**Submitted by:** Shayna Goles  
**Project:** Resource Test — Shayna G.  
**Deadline:** May 24, 2026 | 2:00 PM Eastern Time

---

## Approach & Order of Work

- Reviewed the Figma mockup thoroughly before writing any code.
- Set up the project folder structure (HTML, SCSS, JS, assets, and PHP handling).
- Built the page section-by-section using semantic HTML.
- Styled the project using SCSS with Bootstrap as the base framework.
- Implemented responsive layouts and tested desktop, tablet, and mobile breakpoints.
- Designed and developed the additional contact form section not included in the original mockup.
- Added server-side validation and PHPMailer integration with a local logging fallback.
- Implemented the requested three-column collections layout revision and designed a matching third collection card.
- Connected the project to GitHub and deployed the site to Vercel.
- Performed final responsive and functionality testing across devices.

---

## Completed Features

- Fully responsive landing page implementation from the provided Figma mockup.
- Bootstrap-based responsive layout structure.
- Custom SCSS styling architecture.
- Responsive hero section with video integration.
- Three-column collections section revision with custom third collection card.
- Responsive embedded video section with custom play interaction.
- Custom-designed contact form section integrated naturally into the page flow.
- Client-side and server-side validation for the contact form.
- PHPMailer-ready backend integration with submission logging fallback.
- Success/error messaging for form submission feedback.
- Responsive image gallery/lifestyle section.
- Fully responsive footer and accessibility section.
- GitHub repository setup and deployment to Vercel.

---

## AI Usage

Used AI to generate initial SCSS boilerplate and scaffold the collections section layout. All responsive breakpoint decisions, visual styling adjustments, debugging, and final integration were done independently

---

## Independent Decisions

1. Chose PHPMailer instead of PHP `mail()` to allow cleaner SMTP integration and more reliable email handling.
2. Implemented a `submissions.log` fallback system so submissions can still be verified even when SMTP credentials are unavailable.
3. Converted the collections section into a responsive three-column layout and designed a third matching collection card while maintaining the visual consistency of the original design.
4. Kept the final deployment frontend-based using `index.html` for better compatibility with Vercel static hosting while maintaining PHP server-side handling separately.
5. Added responsive spacing and stacking adjustments for tablet and mobile layouts to preserve readability and visual hierarchy.

---

## Design Revision — Collections Layout

I converted the collections area into a responsive three-column layout using Bootstrap’s grid system. A third collection card was added and designed to visually match the typography, spacing, image treatment, and structure of the original two cards. The layout collapses appropriately across tablet and mobile breakpoints to maintain readability and spacing consistency.

---

## Contact Form Design Approach

- Positioned the contact form between the “DOWNLOAD BROCHURE” CTA and the lifestyle image section to maintain the page’s visual rhythm.
- Designed the form to match the site’s existing typography, spacing, and neutral color palette.
- Implemented fields for:
  - Full Name
  - Email Address
  - Inquiry Type
  - Message
  - Submit Button
- Added responsive behavior using Bootstrap grid classes.
- Added both client-side and server-side validation.
- Integrated PHPMailer-ready backend handling with a logging fallback when SMTP credentials are unavailable.
- Added success/error feedback messaging for user interaction.

---

## Technical Notes

### `index.html`
- Built using semantic HTML structure.
- Added the custom contact form section.
- Integrated responsive Bootstrap grid layouts.
- Connected JavaScript form submission handling through `assets/js/main.js`.

### `scss/style.scss`
- All styling authored in SCSS.
- Bootstrap used as the base framework.
- Added custom variables, typography styles, spacing, responsive breakpoints, and section-specific styling.
- Compiled into `scss/style.css`.

### `form-handler.php`
- Performs server-side validation for required fields and email formatting.
- Uses PHPMailer integration structure for SMTP support.
- Stores submissions locally in `submissions.log` if SMTP credentials are not configured.
- Returns success/error states back to the frontend.

---

## Questions & How I Resolved Them

### Q1: Some visual assets required adaptation during implementation.
**Resolution:**  
I sourced equivalent visuals that matched the intended aesthetic and layout direction while maintaining consistency with the original design language.

### Q2: SMTP credentials and final recipient email were not provided.
**Resolution:**  
I integrated PHPMailer with placeholder SMTP configuration and implemented a local logging fallback to ensure submissions could still be verified during review.

### Q3: Responsive behavior for the unmocked contact form section was not specified.
**Resolution:**  
I followed the spacing and visual rhythm established in the provided design and implemented responsive stacking behavior using Bootstrap grid utilities.

### Q4: Static deployment platforms do not natively support traditional PHP handling.
**Resolution:**  
I separated the frontend deployment (`index.html`) from the PHP backend handling logic while maintaining the complete PHP implementation in the repository for review and future server-side deployment.

---

## Total Hours

**6 hours 24 minutes**

---

## GitHub Repository

https://github.com/shaynjasx/solstice-landing

---

## Live Preview

https://solstice-landing.vercel.app

---

## Conclusion

This project was built with a focus on responsive implementation, clean semantic structure, maintainable SCSS organization, and practical server-side form handling. The goal was to closely match the provided design while making thoughtful responsive and UX decisions independently where specifications were not explicitly provided.

I look forward to discussing the project and any real-time modifications during the Teams call.