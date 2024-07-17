<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $wisatas->nama_wisata }} - Dispar</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<body>
    <main class="w-full">
        <x-nav-bar></x-nav-bar>
        <div class="w-full">
            <section class="relative overflow-hidden min-h-screen bg-cover">
                @php
                    $firstFoto = $wisatas->fotoWisata->first();
                @endphp
                <div class="h-full w-full absolute inset-0">
                    @if ($firstFoto)
                        <img src="{{ asset($firstFoto->path) }}" alt="{{ $wisatas->nama_wisata }}"
                            class="w-full h-full object-cover transition-opacity duration-300 hover:opacity-50">
                    @else
                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image"
                            class="w-full h-full object-cover transition-opacity duration-300 hover:opacity-50">
                    @endif
                </div>
                
                <div class="px-4 lg:px-36 xl:px-40 relative z-20 flex items-center justify-center min-h-screen bg-black bg-opacity-0 hover:bg-black hover:bg-opacity-80 transition duration-300">
                    <div class="">
                        <h1 class="text-white text-center text-4xl md:text-5xl xl:text-6xl font-bold leading-tight">{{ $wisatas->nama_wisata }}</h1>
                    </div>
                </div>
            </section>
        </div>
        


        <div class="py-6 px-4 lg:px-36 xl:px-40">
            <main class="">
                <section class="">
                    <div class="">
                        <h1 class="leading-tight font-bold sm:text-2xl md:text-4xl lg:text-4xl mb-2">
                            {{ $wisatas->nama_wisata }}</h1>
                        <div class="leading-tight text-justify sm:text-2xl md:text-4xl lg:text-xl">
                            <p>{!! $wisatas->deskripsi !!}</p>
                        </div>
                    </div>
                    <br>

                    <div id="gallery"
                        class="relative w-full h-[200px] sm:h-[355px] md:w-[600px] md:h-[500px] lg:w-[800px] lg:h-[550px] mx-auto border rounded-lg"
                        data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-full overflow-hidden rounded-lg">
                            @foreach ($wisatas->fotoWisata as $index => $foto)
                                <div class="hidden duration-700 ease-in-out {{ $index === 0 ? 'block' : '' }}"
                                    data-carousel-item>
                                    <img src="{{ asset($foto->path) }}"
                                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="{{ $wisatas->nama_wisata }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-blcak dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                    <div class="mb-4 mt-7 rounded-lg overflow-hidden">
                        <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0" src="{{ $wisatas->google_maps_url }}">
                        </iframe>
                    </div>
                    <div class="text-center">Map Lokasi</div>
                    <br>
                </section>
            </main>
        </div>

        <!-- Input Comment Section -->
        <div class="container mx-auto text-center bg-slate-200 relative py-6 px-4 lg:px-36 xl:px-40">
            <div class="row">
                <div class="col-md-12">
                    @auth
                        <form method="POST" enctype="multipart/form-data" action="{{ route('submit-comment') }}"
                            class="space-y-4">
                            {{ csrf_field() }}
                            <input type="hidden" name="wisata_id" value="{{ $wisatas->id }}">
                            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="konten" rows="6" name="konten" minlength="2" maxlength="1020"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..."
                                    required></textarea>
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
                        <br>
                        <a href="{{ route('login') }}"
                            class="btn btn-medium rounded bg-pink-600 text-white hover:bg-pink-700 py-2 px-4"
                            onclick="showLoginPrompt()">
                            Login to Comment
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <section class="relative py-6 px-4 lg:px-36 xl:px-40 dark:bg-gray-900">
            <div class="">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Komentar</h2>
                </div>
                @if ($comments->isEmpty())
                    <p class="text-gray-900 dark:text-white">Belum ada komentar.</p>
                @else
                    @foreach ($comments as $comment)
                        <article class="text-base bg-white rounded-lg dark:bg-gray-900 mb-4">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p
                                        class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full"
                                            src="{{ $comment->user->profile->foto_profil ? asset('uploads/' . $comment->user->profile->foto_profil) : asset('images/profil-blank.webp') }}"
                                            alt="Profile Picture">
                                        {{ $comment->user->profile->nama_lengkap }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="{{ $comment->created_at->toDateString() }}"
                                            title="{{ $comment->created_at->format('F jS, Y') }}">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </time>
                                    </p>
                                </div>
                                {{-- <button id="dropdownCommentButton_{{ $comment->id }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button> --}}

                                {{-- <div id="dropdownComment_{{ $comment->id }}"
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
                                </div> --}}
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">{{ $comment->konten }}</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                    </svg>
                                    Reply
                                </button>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>
        </section>
    </main>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
            });

            const commentElements = document.querySelectorAll('.comment');

            commentElements.forEach(commentElement => {
                const commentId = commentElement.dataset.commentId;
                const dropdownCommentButton = document.getElementById(`dropdownCommentButton_${commentId}`);
                const dropdownComment = document.getElementById(`dropdownComment_${commentId}`);

                dropdownCommentButton.addEventListener('click', () => {
                    dropdownComment.classList.toggle('hidden');
                });
            });
        });
    </script> --}}
    <x-footer></x-footer>
</body>

</html>
