<?php return array (
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'lavary/laravel-menu' => 
  array (
    'providers' => 
    array (
      0 => 'Lavary\\Menu\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Menu' => 'Lavary\\Menu\\Facade',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
  ),
  'webpatser/laravel-uuid' => 
  array (
    'providers' => 
    array (
      0 => 'Webpatser\\Uuid\\UuidServiceProvider',
    ),
    'aliases' => 
    array (
      'Uuid' => 'Webpatser\\Uuid\\Uuid',
    ),
  ),
);