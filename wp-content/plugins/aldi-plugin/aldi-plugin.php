<?php
/** 
 * Plugin Name: Aldi Plugin
 */

 register_activation_hook(__FILE__, function () {
   touch(__DIR__ . '/aldi');
 });

 register_deactivation_hook(__FILE__, function () {
  unlink(__DIR__ . '/aldi');
});