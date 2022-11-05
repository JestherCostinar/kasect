<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;1,300&display=swap"
        rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#8b3dff",
                    },
                    fontFamily: {
                        'nunito': ['nunito', 'sans-serif']
                    },
                },
            },
        };
    </script>
    <title>{{ $title ?? 'Larafinds' }}</title>
</head>

<body class="mb-48  ">
    <nav class="flex justify-between items-center mb-4 shadow-2xl">
        <a href="/"><img class="w-24 p-3" src="{{ asset('images/kasmir-project.png') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold uppercase">Welcone {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="{{ route('listing.manage') }}" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li>
                <li>
                    <form action="{{ route('user.logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="submit">
                            <i class="fa-solid fa-door-closed">Logout</i>
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('user.register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                        Register</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="hover:text-laravel"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>

    <main class="mx-20 mt-10">
        @yield('content')
    </main>

    <footer
        class="fixed
             inset-x-0
             bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-black-50 h-24 mt-24  opacity-90 md:justify-center shadow-1x2 shadow-inner bg-gray-200">
        <p class="ml-2 ">Copyright &copy; 2022, All Rights reserved</p>

        <a href="{{ route('listing.create') }}"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5 bg-violet-600">Add Project</a>
    </footer>
    <x-flash-message></x-flash-message>
</body>

</html>
