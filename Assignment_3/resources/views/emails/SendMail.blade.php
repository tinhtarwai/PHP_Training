@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>The email is a sample email for Laravel Tutorial: How to Send an Email using Laravel 8 </p>

Thanks,<br>
{{ config('app.name') }}