<?php
shell_exec(sprintf('php file-watcher/index.php %s >> file-watcher/log.log &', $argv[1]));
