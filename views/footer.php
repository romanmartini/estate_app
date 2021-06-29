<?php

if( $GLOBALS['route'] === 'search-properties' ) $script_js = "<script async src='./public/js/search-properties.js'></script>";
elseif( $GLOBALS['route'] === 'my-properties' ) $script_js = "<script async src='./public/js/my-properties.js'></script>";
elseif( $GLOBALS['route'] === 'property-add' ) $script_js = "<script async src='./public/js/property-add.js'></script>";
elseif( $GLOBALS['route'] === 'property-edit' ) $script_js = "<script async src='./public/js/property-edit.js'></script>";
elseif( $GLOBALS['route'] === 'gallery' ) $script_js = "<script async src='./public/js/gallery.js'></script>";
else $script_js = '';
$template_footer = "
        </div>
    </main>
    <footer class='footer'>
        <div class='layout-container'>
            <a class='py-3 text-right text-second block' href='components'>Components</a>
        </div>
    </footer>

    <script async src='https://kit.fontawesome.com/719649c35f.js' crossorigin='anonymous'></script>

    <!-- Script -->
    <script async src='./public/js/main.js'></script>    
    $script_js
</body>
</html>
";
echo $template_footer;
