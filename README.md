# Combined.php

Straightforward *.css* and *.js* assets combine script written for PHP.

## Usage

Script loads only assets that are on the directory level next to it.

##### Example structure:

- **(root)**
  - assets/
    - css/
      - normalize.min.css
      - styles.min.css
    - js/
      - modernizr.min.js
      - jquery.min.js
    - **combined/** _(this repository clone)_\*
      - .htaccess
      - index.php

\*_No need to use `combined.php` as name of the repository clone directory._

##### Markup:

```html
<link rel="stylesheet" href="/assets/combined/?files=css/normalize.min.css;css/styles.min.css;" type="text/styles">
<script async type="text/javascript" src="/assets/combined/?files=js/modernizr.min.js;js/jquery.min.js"
```
