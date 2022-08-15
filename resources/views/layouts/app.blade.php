<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.13.0/echo.iife.min.js"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };

        </script>
        <title>Sanctum Api</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <div>
                <a href={{ route('page1') }} class="text-3xl text-blue-500"><i class="fa-solid fa-file"></i> Page 1</a>
                <a href={{ route('page2') }} class="text-3xl text-red-500 ml-4"><i class="fa-solid fa-file"></i> Page 2</a>
            </div>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <button id="logout1"  onclick="logoutFunction()">
                        <i class="fa-solid fa-door-closed"></i>Logout
                    </button>
                </li>
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-green-500 text-white h-24 mt-24 opacity-90 md:justify-center"
        >
        </footer>

        <script type="text/javascript">
            window.Echo = new Echo({
                broadcaster: 'socket.io',
                host: 'http://localhost:6001',
                client : io,
                auth:{
                    headers:{
                        Authorization: "Bearer " + localStorage.getItem('token'),
                    }
                }
            });
            var logoutButton = document.getElementById("logout1");
            if(!localStorage.getItem('token')){
                logoutButton.style.display = "none";
            }else{
                logoutButton.style.display = "block";
            }
            function logoutFunction(){
                var config = {
                    method: 'post',
                    url: 'http://localhost/api/logout',
                    headers: {
                        Accept: 'application/json',
                        Authorization: "Bearer " + localStorage.getItem('token'),
                    },
                };
                axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                    localStorage.removeItem('token');
                    window.location.replace('http://localhost/log');
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        </script>
    </body>
</html>
