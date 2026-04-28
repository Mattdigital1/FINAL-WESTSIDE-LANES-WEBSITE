# Westside Bowling Lanes — Website

Custom multi-page static website for Westside Bowling Lanes (3715 Westbank Expy, Harvey, LA 70058).

## Pages

- `index.html` — Home
- `about.html` — About / our story
- `leagues.html` — Bowling leagues
- `parties.html` — Parties & events
- `birthdays.html` — Birthday parties
- `menu.html` — Bistreaux + Kim's Noodle House menu
- `contact.html` — Contact, hours, directions

## Tech

Plain HTML, CSS, and a tiny bit of JavaScript. No build step, no framework, no dependencies.

- `assets/styles.css` — full design system (brand colors, layout, typography, gallery, responsive breakpoints)
- `assets/main.js` — mobile nav toggle and footer year fill

## Local preview

Open `index.html` in any browser, or serve the folder with any static server:

```bash
python3 -m http.server 8000
# then visit http://localhost:8000
```

## Deploying to Hostinger

**Option 1 — File Manager (one-off upload)**
1. In hPanel go to **Files → File Manager** → open `public_html`.
2. Upload the contents of this folder (the HTML files plus the `assets/` folder).
3. Make sure `index.html` lands at `public_html/index.html`, not nested.

**Option 2 — Git deploy (recommended for ongoing edits)**
1. Push this repo to GitHub.
2. In hPanel go to **Websites → your domain → Advanced → Git**.
3. Add the repo URL, set branch to `main`, install path to `public_html`, click **Create**.
4. After future commits, click **Deploy latest** in hPanel (or set up a webhook).

## Brand

- Display font: Bebas Neue
- Body font: Inter
- Primary palette: red `#e01e2b`, white, light blue `#7cc7ec`
- Deep navy text: `#0e1a34`

## Contact

- Main line: (504) 340-2695
- League coordinator (Theresa Tran): 504-444-8103
- Email: westsidelanesnola@gmail.com
