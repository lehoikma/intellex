<?php

/**
 * Load database.php By Environment
 *   "app/Config/{development|staging|production}/database.php"
 */
Environment::readEnvFile(basename(__FILE__));
