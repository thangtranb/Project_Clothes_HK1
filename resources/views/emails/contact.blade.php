<x-mail::message>
## Email: {{$data['email']}}
<p>
    {{$data['body']}}
</p>


<x-mail::button :url="''">
Xác Nhận Email Gửi Đến!
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
