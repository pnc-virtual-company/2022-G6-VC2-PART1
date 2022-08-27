@component('mail::message')
# Student requese

Information details

@component('mail::table') 

|reques_date               | start_date               | end_date                |  duration              | reason               | leave_type               |
| -------------------------|--------------------------| ------------------------|------------------------|----------------------|--------------------------|
| {{$leave['created_at']}}| {{$leave['start_date']}} |  {{$leave['end_date']}} | {{$leave['duration']}} | {{$leave['reason']}} | {{$leave['leave_type']}} |

@endcomponent

@component('mail::button', ['url' => '','color'=>'green'])
aprove
@endcomponent

@component('mail::button', ['url' => '','color'=>'red'])
enject
@endcomponent

Best regard,<br>
{{ $leave['name'] }}

@endcomponent