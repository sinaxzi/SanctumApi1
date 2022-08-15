@extends('layouts.app')

@section('content')
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        page1

    </div>
    <div id="message1" class="ml-5"></div>
    <script type="text/javascript">
        if(!localStorage.getItem('token')){
            window.location.replace('http://localhost/log');
        }
        var config = {
            method: 'get',
            url: 'http://localhost/api/get',
            headers: { 
                Authorization: "Bearer " + localStorage.getItem('token'),
            }
        };
        axios(config)
        .then(function (response) {
            console.log(JSON.stringify(response.data));
            var userID = response.data.user_id;
            window.Echo.private('user.' + userID)
            .listen('api1Event',function(e){
                var message = e.message;
                document.getElementById('message1').innerHTML = message;
            })
        })
        .catch(function (error) {
            console.log(error);
        });
    </script>
@endsection
