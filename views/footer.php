<?php

if( $GLOBALS['route'] === 'search-properties' ) $script_js = "<script async src='./public/js/search-properties.js'></script>";
elseif( $GLOBALS['route'] === 'my-properties' ) $script_js = "<script async src='./public/js/my-properties.js'></script>";
elseif( $GLOBALS['route'] === 'gallery' ) $script_js = "<script async src='./public/js/gallery.js'></script>";
else $script_js = '';
$template_footer = "
        </div>
    </main>
    <footer>
        <div class='layout-container'>
        </div>
    </footer>

    <!-- Script -->
    $script_js
</body>
</html>
";
echo $template_footer;
