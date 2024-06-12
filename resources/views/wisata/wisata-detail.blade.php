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

        {{-- detail-wisata --}}
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
                    </div>
                </main>
            </div>
        </div>

        <!-- Input Comment Section -->
        <div class="container mx-auto text-center bg-slate-200 relative px-4 py-5 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
            <div class="row">
                <div class="col-md-12">
                    @auth
                        <form method="POST" enctype="multipart/form-data" action="{{ route('submit-comment') }}"
                            class="space-y-4">
                            {{ csrf_field() }}
                            <input type="hidden" name="wisata_id" value="{{ $wisatas->id }}">
                            {{-- <div class="form-group">
                                <textarea placeholder="Comment Here!" class="form-control comment-box w-full rounded" rows="4" required
                                    minlength="10" maxlength="1020" name="konten" id="konten"></textarea>
                            </div> --}}
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
                        <a href="{{ route('login') }}"
                            class="btn btn-medium rounded bg-pink-600 text-white hover:bg-pink-700 py-2 px-4"
                            onclick="showLoginPrompt()">
                            Login to Comment
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32 dark:bg-gray-900">
            <div class="max-w-2xl mx-auto lg:max-w-none">
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
                                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                            alt="Michael Gough">{{ $comment->user->name }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="{{ $comment->created_at->toDateString() }}"
                                            title="{{ $comment->created_at->format('F jS, Y') }}">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </time>
                                    </p>
                                </div>
                                <button id="dropdownCommentButton_{{ $comment->id }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>

                                <div id="dropdownComment_{{ $comment->id }}"
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

    <script>
        // document.addEventListener('DOMContentLoaded', (event) => {
        //     const button = document.getElementById('dropdownCommentButton');
        //     const dropdown = document.getElementById('dropdownComment');

        //     button.addEventListener('click', () => {
        //         if (dropdown.classList.contains('hidden')) {
        //             dropdown.classList.remove('hidden');
        //         } else {
        //             dropdown.classList.add('hidden');
        //         }
        //     });

        //     // Optional: Close the dropdown when clicking outside
        //     document.addEventListener('click', (event) => {
        //         if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        //             dropdown.classList.add('hidden');
        //         }
        //     });
        // });

        const commentElements = document.querySelectorAll('.comment');

        commentElements.forEach(commentElement => {
            const commentId = commentElement.dataset.commentId;
            const dropdownCommentButton = document.getElementById(`dropdownCommentButton_${commentId}`);
            const dropdownComment = document.getElementById(`dropdownComment_${commentId}`);

            dropdownCommentButton.addEventListener('click', () => {
                dropdownComment.classList.toggle('hidden');
            });
        });
    </script>

</body>
<x-footer></x-footer>

</html>
