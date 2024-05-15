<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-primary h-screen flex items-center justify-center">
    <section class="cover bg-blue-teal-gradient relative bg-yellow-800 overflow-hidden w-full flex items-center justify-center min-h-screen">
        <div class="h-full absolute top-0 left-0 z-0">
            <img src="{{ asset('images/Banner_Bjm.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative z-10 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{ url('simpanregistrasi') }}" method="POST">
                {{ csrf_field() }}
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Buat Akun</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">saya menyetujui <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">syarat dan ketentuan</a></label>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat Akun</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Sudah Memiliki Akun? <a href="{{ url('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Masuk</a>
                </div>
            </form>
        </div>
    </section>



<!-- Optionally, include your other HTML and scripts here -->
</body>

</html>
