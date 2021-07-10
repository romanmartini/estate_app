<?php

$controller_script = new ScriptController();
$script_path = $controller_script->load_script($GLOBALS['route']);

$template_footer = "
        </div>
    </main>
    <footer class='footer'>
        <div class='layout-container'>
            <a class='py-3 text-right text-second block' href='components'>Components</a>
        </div>
    </footer>
    $script_path
</body>
</html>";

echo $template_footer;