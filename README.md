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
- Client-side validation and Formspree integration for form submission handling.
- Success/error messaging for form submission feedback.
- Responsive image gallery/lifestyle section.
- Fully responsive footer and accessibility section.
- GitHub repository setup and deployment to Vercel.

---

## AI Usage

- Used AI to help scaffold the initial SCSS structure and generate the collections section layout boilerplate.
- Used AI for clarification on Bootstrap grid behavior and SCSS nesting patterns.
- Used AI as a debugging and reference tool during deployment and GitHub integration.
- All responsive decisions, layout implementation, visual styling, debugging, deployment, and final integration work were completed independently.

---

## Independent Decisions

1. Chose Formspree over PHPMailer for live form handling since Vercel is a static hosting platform and does not execute PHP. This allowed the form to remain fully functional on the live deployment while keeping the implementation clean and maintainable.
2. Implemented a `submissions.log` fallback in `form-handler.php` so submissions could still be verified even when SMTP credentials are unavailable — kept in the repository to demonstrate server-side validation and PHPMailer knowledge.
3. Converted the collections section into a responsive three-column layout and designed a third matching collection card — the Summit Collection — while maintaining the visual consistency of the original two cards.
4. Kept the final deployment frontend-based on Vercel for better static hosting compatibility while maintaining the complete PHP implementation in the repository for review.
5. Added responsive spacing and stacking adjustments for tablet and mobile layouts to preserve readability and visual hierarchy across all screen sizes.

---

## Design Revision — Collections Layout

I converted the collections area into a responsive three-column layout using Bootstrap's grid system. A third collection card — the **Summit Collection** — was added and designed to visually match the typography, spacing, image treatment, and structure of the original two cards. The layout collapses appropriately across tablet and mobile breakpoints to maintain readability and spacing consistency.

---

## Contact Form Design Approach

- Positioned the contact form between the "DOWNLOAD BROCHURE" CTA and the lifestyle image section to maintain the page's visual rhythm.
- Designed the form to match the site's existing typography, spacing, and neutral color palette.
- Implemented fields for Full Name, Email Address, Inquiry Type, Message, and a Submit button.
- Added responsive behavior using Bootstrap grid classes.
- Added client-side validation via HTML required attributes.
- Integrated Formspree for live form submission handling — submissions are delivered to email and tracked via the Formspree dashboard.
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

### `assets/js/main.js`
- Handles video play/pause interaction.
- Handles contact form submission via Formspree API using fetch.
- Returns success or error feedback to the user without page reload.

### `form-handler.php`
- Included in the repository to demonstrate server-side validation and PHPMailer integration knowledge.
- Performs server-side validation for required fields and email formatting.
- Uses PHPMailer integration structure for SMTP support.
- Stores submissions locally in `submissions.log` as a fallback.
- Not used in the live Vercel deployment due to static hosting limitations.

---

## Questions & How I Resolved Them

### Q1: Some visual assets required adaptation during implementation.
**Resolution:**  
I sourced equivalent visuals that matched the intended aesthetic and layout direction while maintaining consistency with the original design language.

### Q2: The live deployment platform (Vercel) does not support PHP execution.
**Resolution:**  
I used Formspree for the live form handling since Vercel is a static hosting platform. The `form-handler.php` is still included in the repository to demonstrate server-side validation knowledge and can be configured with real SMTP credentials when deployed to a PHP-supported server.

### Q3: No recipient email address was specified for the contact form.
**Resolution:**  
Since no email was provided in the brief, I used my personal email address as the form recipient in the interim via Formspree. This can easily be updated to the correct recipient email when provided.

### Q4: Responsive behavior for the unmocked contact form section was not specified.
**Resolution:**  
I followed the spacing and visual rhythm established in the provided design and implemented responsive stacking behavior using Bootstrap grid utilities.

### Q5: Static deployment platforms do not natively support traditional PHP handling.
**Resolution:**  
I separated concerns by keeping the PHP implementation in the repository for review while using Formspree for the live deployment. This ensured the form remained fully functional on Vercel without requiring a separate backend server.

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

This project was built with a focus on responsive implementation, clean semantic structure, maintainable SCSS organization, and practical form handling. The goal was to closely match the provided design while making thoughtful responsive and UX decisions independently where specifications were not explicitly provided. I look forward to discussing the project and any real-time modifications during the Teams call.