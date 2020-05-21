# Laravel VoiceCall package  
Laravel voicecall package allows you to make voice calls with different providers
  
# Installation  
```bash  
composer require chocofamilyme/laravel-voicecall
```
  
# Publishing the configuration
```bash  
php artisan vendor:publish --provider="Chocofamilyme\LaravelVoiceCall\VoicecallServiceProvider"
```
  
# Examples
### make voice call
```php  
VoicecallService::create()->call();
```