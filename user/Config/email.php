<?php

/**
 * Load database.php By Environment
 *   "app/Config/{development|staging|production}/email.php"
 */
Environment::readEnvFile(basename(__FILE__));