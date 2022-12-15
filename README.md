Website for dbwebb using 11ty
=========================

Try 1.

Clone the repo and watch it in action.

```text
npm run public   # Generate from public/ into dist/
npm run content  # Generate from content/ into dist/
npm run serve    # Generate from content/ and serve the dist/
```

The tool is intended to take the files from `public/` (html, css, js, php) and `content` (md) and move it into `dist/` which is the static site.



The directory structure
--------------------------

| Directory | Purpose |
|-----------|---------|
| `content_orig` | The original markdown content of the website. |
| `content` | The new and updated markdown content of the website. |
| `public_orig` | The original html/css/js/php content of the website, named `htdocs` in the original website. |
| `public` | The html/css/js/php content of the website. |



ToDo
--------------------------

These are the basics to get going for real.

* [ ] Convert a minor set of the markdown files.
* [ ] Add a basic stylesheet.
* [ ] Add a small layout to start with.
 
Then the real work starts...
