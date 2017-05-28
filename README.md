> <h1 align="center">Xetaravel Mentions</h1>
>
> |Travis|Coverage|Stable Version|Downloads|Laravel|License|
> |:-------:|:------:|:-------:|:-------:|
> |[![Build Status](https://img.shields.io/travis/XetaIO/Xetaravel-Mentions.svg?style=flat-square)](https://travis-ci.org/XetaIO/Xetaravel-Mentions)|[![Coverage Status](https://img.shields.io/coveralls/XetaIO/Xetaravel-Mentions/master.svg?style=flat-square)](https://coveralls.io/r/XetaIO/Xetaravel-Mentions)|[![Latest Stable Version](https://img.shields.io/packagist/v/XetaIO/Xetaravel-Mentions.svg?style=flat-square)](https://packagist.org/packages/xetaio/xetaravel-mentions)|[![Total Downloads](https://img.shields.io/packagist/dt/xetaio/xetaravel-mentions.svg?style=flat-square)](https://packagist.org/packages/xetaio/xetaravel-mentions)|[![Laravel 5.4](https://img.shields.io/badge/Laravel-5.4-f4645f.svg?style=flat-square)](http://laravel.com)|[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/XetaIO/Xetaravel-Mentions/blob/master/LICENSE)|
>
> A package to parse `@mentions` from a text and mention the user with a notification. (Inspired from the [laravel-mentions](https://github.com/jameslkingsley/laravel-mentions) package.)
>
> ## Requirement
> ![PHP](https://img.shields.io/badge/PHP->=7.0-brightgreen.svg?style=flat-square)
>
> ## Installation
>
> ```
> composer require xetaio/xetaravel-mentions
> ```
>
> #### ServiceProviders
> Import the `MentionServiceProvider` in your `config/app.php`:
> ```php
> 'providers' => [
>   //...
>   Xetaio\Mentions\Providers\MentionServiceProvider::class,
>   //...
> ]
> ```
