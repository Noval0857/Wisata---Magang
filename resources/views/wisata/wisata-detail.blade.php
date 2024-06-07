<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $wisatas->nama_wisata }} - Dispar</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="w-full">
        <x-header></x-header>
        <div class="">
            <section
                class="cover bg-blue-teal-gradient relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex
            items-center min-h-screen">
                <div class="h-full absolute top-0 left-0 z-0">
                    <img src="{{ asset('images/Banner_Bjm.jpg') }}" alt="" class="w-full h-full object-cover">
                </div>

            </section>
        </div>
        <div class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="content_wrapper clearfix">

                <main class="sections_group">

                    <div class="entry-content" itemprop="mainContentOfPage">
                        <div class="mfn-builder-content mfn-default-content-buider">
                            <section class="section mcb-section mfn-default-section mcb-section-kipi6b65 default-width">
                                @foreach ($wisatas->fotoWisata as $foto)
                                    <img src="{{ Storage::url($foto->path) }}" alt="{{ $wisatas->nama_wisata }}"
                                        class="w-full">
                                @endforeach
                                <div class="column_attr mfn-inline-editor clearfix">
                                    <h1 class="font-bold">{{ $wisatas->nama_wisata }}</h1>
                                    <p class="text-justify">{{ $wisatas->deskripsi }}</p>
                                </div>
                                <div class="mb-4">
                                    <iframe width="100%" height="400" frameborder="0" scrolling="no"
                                        marginheight="0" marginwidth="0" src="{{ $wisatas->google_maps_url }}">
                                    </iframe>
                                </div>
                                {{-- <div class="border-2 border-solid">
                                    <iframe width="100%" height="400" frameborder="0" scrolling="no"
                                        marginheight="0" marginwidth="0"
                                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=8P4M+X9H,%20Sungai%20Jelai,%20Tambang%20Ulang,%20Tanah%20Laut%20Regency,%20South%20Kalimantan%2070854+(My%20Business%20Name)&amp;t=k&amp;z=8&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div> --}}
                                <div class="text-center">map lokasi</div>
                                <div class="column_attr mfn-inline-editor clearfix">
                                    <p class="text-justify">{{ $wisatas->deskripsi }}</p>
                                    <p><strong>Alamat :</strong> <em>{{ $wisatas->alamat }}</em></p>
                                </div>
                                <div class="column_attr mfn-inline-editor clearfix">
                                    <p class="text-justify">{{ $wisatas->deskripsi }}</p>
                                </div>
                            </section>
                        </div>


                        {{-- <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                            <div class="max-w-2xl mx-auto px-4">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion
                                        (20)</h2>
                                </div>
                                <form class="mb-6">
                                    <div
                                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" rows="6"
                                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                            placeholder="Write a comment..." required></textarea>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Post comment
                                    </button>
                                </form>
                                <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p
                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                    alt="Michael Gough">Michael Gough</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                                            </p>
                                        </div>
                                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                            <span class="sr-only">Comment settings</span>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownComment1"
                                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really
                                        worth time reading. Thank you! But tools are just the
                                        instruments for the UX designers. The knowledge of the design tools are as
                                        important as the
                                        creation of the design strategy.</p>
                                    <div class="flex items-center mt-4 space-x-4">
                                        <button type="button"
                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                            </svg>
                                            Reply
                                        </button>
                                    </div>
                                </article>
                            </div>
                        </section> --}}

                    </div>

                </main>

            </div>
        </div>

        {{-- <div class="container mx-auto text-center py-5 px-48 bg-slate-200">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data" action="" class="space-y-4">
                        @csrf
                        <div class="form-group">
                            <textarea placeholder="   Comment Here !" class="form-control comment-box w-full rounded" rows="4" required minlength="10" maxlength="1020" name="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-medium rounded bg-pink-600 text-white hover:bg-pink-700 py-2 px-4">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>         --}}

        {{-- <!-- Login Prompt -->
        <div id="loginPrompt" class="container mx-auto text-center text-lg mt-5 sign-up hidden">
            <div class="row">
                <div class="col-md-11 mx-auto bg-white shadow-md rounded">
                    <div class="relative overflow-hidden w-full text-center py-4">
                        <span class="text-lg font-semibold uppercase">
                            Please login to perform this action
                        </span>
                    </div>
                    <div class="flex justify-center space-x-4 py-5">
                        <div>
                            <a href="https://foodieadvice.com/login/google"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                Google
                                <i class="fab fa-google ml-2"></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://foodieadvice.com/login/facebook"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                Facebook
                                <i class="fab fa-facebook-f ml-2"></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://foodieadvice.com/login/twitter"
                                class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                Twitter
                                <i class="fab fa-twitter ml-2"></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://foodieadvice.com/register"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                Email
                                <i class="fa fa-envelope ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Comment Section -->
        <div class="container mx-auto text-center py-5 px-48 bg-slate-200">
            <div class="row">
                <div class="col-md-12">
                    @auth
                        <form method="POST" enctype="multipart/form-data" action="{{ route('submit-comment') }}"
                            class="space-y-4">
                            {{ csrf_field() }}
                            <input type="hidden" name="wisata_id" value="{{ $wisatas->id }}">
                            <div class="form-group">
                                <textarea placeholder="Comment Here!" class="form-control comment-box w-full rounded" rows="4" required
                                    minlength="10" maxlength="1020" name="konten" id="konten"></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-medium rounded bg-pink-600 text-white hover:bg-pink-700 py-2 px-4">
                                Post Comment
                            </button>
                        </form>
                    @else
                        <div class="form-group">
                            <textarea placeholder="Please login to comment" class="form-control comment-box w-full rounded bg-gray-200"
                                rows="4" disabled></textarea>
                        </div>
                        <a href="##"
                            class="btn btn-medium rounded bg-pink-600 text-white hover:bg-pink-700 py-2 px-4"
                            onclick="showLoginPrompt()">
                            Login to Comment
                        </a>
                    @endauth
                </div>
            </div>
        </div>

    </main>

    {{-- <script>
        function showLoginPrompt() {
            document.getElementById('loginPrompt').classList.remove('hidden');
            document.getElementById('loginPrompt').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script> --}}
</body>
<x-footer></x-footer>

</html>
