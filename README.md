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
- Built a PHP form handler with MySQL database storage for server-side form validation and submission logging.
- Connected the project to GitHub and deployed the site to Vercel.
- Performed final responsive and functionality testing across devices.

---

## Completed Features

- Fully responsive landing page implementation from the provided Figma mockup.
- Bootstrap-based responsive layout structure.
- Custom SCSS styling architecture.
- Responsive hero section with autoplay video integration.
- Three-column collections section revision with custom third collection card.
- Responsive embedded video section with custom play/pause interaction.
- Custom-designed contact form section integrated naturally into the page flow.
- Server-side validation using PHP with MySQL database storage for form submissions.
- Environment-aware form handling: PHP and MySQL on local server, Formspree on live deployment.
- Success and error messaging for form submission feedback.
- Responsive lifestyle image gallery section.
- Fully responsive footer with accessibility section.
- GitHub repository setup and deployment to Vercel.

---

## AI Usage

- Used AI to help scaffold the initial SCSS structure and generate the collections section layout boilerplate.
- Used AI for clarification on Bootstrap grid behavior and SCSS nesting patterns.
- Used AI as a debugging and reference tool during PHP, MySQL, and deployment integration.
- Used AI to help with grammar and wording clarity in written communication throughout the process.
- All responsive decisions, layout implementation, visual styling, PHP and database work, debugging, deployment, and final integration were completed independently.

---

## Independent Decisions

1. Implemented an environment-aware form handler in JavaScript that automatically detects whether the site is running locally or on a live server. On localhost, the form submits to the PHP handler and saves to a MySQL database. On the live Vercel deployment, it routes to Formspree. This kept the form fully functional in both environments without requiring separate codebases.

2. Built a PHP form handler with PDO and MySQL to validate all fields server-side and store submissions in a database. This fulfilled the bonus requirement of database storage and demonstrates server-side validation beyond basic HTML required attributes.

3. Added a submissions.log file as a secondary record of form submissions alongside the database, providing an additional audit trail that can be reviewed without accessing phpMyAdmin.

4. Converted the collections section into a responsive three-column layout and designed a third matching collection card — the Summit Collection — maintaining the visual consistency of the original two cards in terms of typography, image treatment, spacing, and copy tone.

5. Kept the live deployment on Vercel for better static hosting performance while retaining the complete PHP and MySQL implementation in the repository for demonstration and review purposes.

6. Added responsive spacing and stacking adjustments for tablet and mobile layouts to preserve readability and visual hierarchy across all screen sizes.

---

## Design Revision — Collections Layout

I converted the collections area from a horizontal alternating layout into a responsive three-column grid using Bootstrap. A third collection card — the Summit Collection — was designed from scratch to visually match the typography, spacing, image treatment, and structure of the original Horizon and Reflection cards. The layout collapses appropriately across tablet and mobile breakpoints to maintain readability and spacing consistency.

---

## Contact Form Design Approach

- Positioned the contact form between the Download Brochure button and the lifestyle image section to maintain the page visual rhythm.
- Designed the form to match the existing typography, spacing, and neutral color palette of the page.
- Implemented fields for Full Name, Email Address, Type of Inquiry (dropdown), Message, and a Submit button.
- Added responsive behavior using Bootstrap grid classes.
- Implemented server-side validation in PHP checking for required fields and valid email format.
- Built a MySQL database table to store all form submissions with a timestamp for each entry.
- Added a submissions.log file as a secondary record alongside the database.
- Integrated Formspree as the live form handler on the Vercel deployment since Vercel does not support PHP execution. Form submissions on the live site are successfully received and forwarded to my email address via Formspree, confirming end-to-end functionality on the live deployment.
- Added success and error feedback messaging for user interaction without page reload.

---

## Technical Notes

### `index.html`
- Built using semantic HTML structure.
- Added the custom contact form section with all required fields and name attributes.
- Integrated responsive Bootstrap grid layouts throughout.
- Connected JavaScript form submission handling through assets/js/main.js.

### `scss/style.scss`
- All styling authored in SCSS.
- Bootstrap used as the base framework.
- Custom variables, typography styles, spacing, responsive breakpoints, and section-specific styling applied throughout.
- Compiled into scss/style.css via Live Sass Compiler.

### `assets/js/main.js`
- Handles video play and pause interaction.
- Detects the current environment (localhost vs live) and routes form submissions accordingly.
- On localhost: submits to api/form-handler.php and saves to MySQL.
- On live deployment: submits to Formspree.
- Returns success or error feedback to the user without page reload.

### `api/form-handler.php`
- Performs server-side validation for all required fields and email format using PHP.
- Connects to a MySQL database using PDO and stores each submission in the contact_submissions table.
- Writes a secondary record of each submission to submissions.log for audit purposes.
- Fully functional on any PHP-supported server such as XAMPP locally.
- Not executed on the live Vercel deployment due to static hosting limitations.

### Database — `solstice_db.contact_submissions`
- Stores full_name, email, inquiry_type, message, and submitted_at timestamp for each submission.
- Created and managed via phpMyAdmin on XAMPP.
- Demonstrated working locally with real submission data saved successfully.

---

## Questions & How I Resolved Them

### Q1: Some visual assets were not directly exportable from the Figma file at acceptable quality.
**Resolution:**  
I sourced equivalent visuals from free stock sites in Canva , Google , Pexels, selecting images that closely matched the aesthetic and content of the original mockup — ranch landscapes, home exteriors, and lifestyle photography.

### Q2: The live deployment platform (Vercel) does not support PHP execution.
**Resolution:**  
I used Formspree for the live form handling and retained the complete PHP and MySQL implementation in the repository for review. The JavaScript handler automatically detects the environment and routes submissions to the correct endpoint.

### Q3: No recipient email address was specified for the contact form.
**Resolution:**  
Since no email was provided in the brief, I used my personal email as the interim recipient via Formspree. This can be updated to the correct address when provided.

### Q4: Responsive behavior for the unmocked contact form section was not specified.
**Resolution:**  
I followed the spacing and visual rhythm established in the provided design and implemented responsive stacking behavior using Bootstrap grid utilities.

### Q5: No image or video assets were provided with the project.
**Resolution:**  
I exported what was available from the Figma file and supplemented with free stock assets from Pexels and Unsplash to match the visual direction of the original design.

---

## Total Hours

**Total Worked Hours: 06:41:50**

---

## GitHub Repository

https://github.com/shaynjasx/solstice-landing

---

## Live Preview

https://solstice-landing.vercel.app

---

## Conclusion

This project was built with a focus on responsive implementation, clean semantic structure, maintainable SCSS organization, and practical form handling with real server-side validation and database storage. The goal was to closely match the provided design while making thoughtful independent decisions on layout, form design, and deployment strategy. I look forward to discussing the project and any real-time modifications during the Teams call.