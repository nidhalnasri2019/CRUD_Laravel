<x-mail::message>
# Hi {{$user->name}}

welcome to CDF center !
you have bee creat a new post

<x-mail::button :url="'www.cdfcenter.com'">
Viste our web site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
