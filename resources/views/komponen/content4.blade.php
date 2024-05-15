<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <section class="flex justify-center items-center h-screen">
        <div class="w-full max-w-5xl h-3/4 max-h-[50rem] flex justify-between items-stretch space-x-2">

            <article
                class="flex-card-container flex flex-col justify-end bg-cover bg-center rounded-lg cursor-pointer transition-all duration-[450ms] ease-in-out bg-[url('{{ asset('images/image.png') }}')] active:w-2/3"
                id="bild-1">
                <div
                    class="overlay absolute bottom-0 left-0 right-0 h-36 p-6 flex justify-start items-end w-full transition-all duration-[450ms] ease-in-out bg-gradient-to-t from-black via-transparent to-transparent">
                    <div
                        class="icon w-12 h-12 rounded-full bg-gray-900 flex justify-center items-center transition-all duration-[450ms] ease-in-out text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="text-2xl transition-all duration-[350ms] delay-[200ms] ease-in-out opacity-0 transform translate-x-[-15px]">Taman Labirin</h3>
                        <p class="text-lg transition-all duration-[350ms] delay-[300ms] ease-in-out opacity-0 transform translate-x-[-15px]">berkonsep agrowisata sebagai daya tariknya</p>
                    </div>
                </div>
            </article>

            <article
                class="flex-card-container flex flex-col justify-end bg-cover bg-center rounded-lg cursor-pointer transition-all duration-[450ms] ease-in-out bg-[url('{{ asset('images/image.png') }}')]"
                id="bild-2">
                <div
                    class="overlay absolute bottom-0 left-0 right-0 h-36 p-6 flex justify-start items-end w-full transition-all duration-[450ms] ease-in-out bg-gradient-to-t from-black via-transparent to-transparent">
                    <div
                        class="icon w-12 h-12 rounded-full bg-gray-900 flex justify-center items-center transition-all duration-[450ms] ease-in-out text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="text-2xl transition-all duration-[350ms] delay-[200ms] ease-in-out opacity-0 transform translate-x-[-15px]">Kiram Park</h3>
                        <p class="text-lg transition-all duration-[350ms] delay-[300ms] ease-in-out opacity-0 transform translate-x-[-15px]">Wisata perbukitan dengan udara yang sejuk</p>
                    </div>
                </div>
            </article>

            <article
                class="flex-card-container flex flex-col justify-end bg-cover bg-center rounded-lg cursor-pointer transition-all duration-[450ms] ease-in-out bg-[url('images/image.png')]"
                id="bild-3">
                <div
                    class="overlay absolute bottom-0 left-0 right-0 h-36 p-6 flex justify-start items-end w-full transition-all duration-[450ms] ease-in-out bg-gradient-to-t from-black via-transparent to-transparent">
                    <div
                        class="icon w-12 h-12 rounded-full bg-gray-900 flex justify-center items-center transition-all duration-[450ms] ease-in-out text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="text-2xl transition-all duration-[350ms] delay-[200ms] ease-in-out opacity-0 transform translate-x-[-15px]">Menara Pandang</h3>
                        <p class="text-lg transition-all duration-[350ms] delay-[300ms] ease-in-out opacity-0 transform translate-x-[-15px]">Melihat keindahan kota Banjarmasin di ketinggian</p>
                    </div>
                </div>
            </article>

            <article
                class="flex-card-container flex flex-col justify-end bg-cover bg-center rounded-lg cursor-pointer transition-all duration-[450ms] ease-in-out bg-[url('{{ asset('images/image.png') }}')]"
                id="bild-4">
                <div
                    class="overlay absolute bottom-0 left-0 right-0 h-36 p-6 flex justify-start items-end w-full transition-all duration-[450ms] ease-in-out bg-gradient-to-t from-black via-transparent to-transparent">
                    <div
                        class="icon w-12 h-12 rounded-full bg-gray-900 flex justify-center items-center transition-all duration-[450ms] ease-in-out text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="text-2xl transition-all duration-[350ms] delay-[200ms] ease-in-out opacity-0 transform translate-x-[-15px]">Pasar Terapung</h3>
                        <p class="text-lg transition-all duration-[350ms] delay-[300ms] ease-in-out opacity-0 transform translate-x-[-15px]">Pasar tradisional di atas sungai yang menggunakan jukung</p>
                    </div>
                </div>
            </article>

        </div>
    </section>

    <script>
        const ACTIVECLASS = 'active';
        const IMAGES = document.querySelectorAll('.flex-card-container');
        let currentIndex = 0;
        let intervalId;
        let activeImageTimeout;

        function removeActiveClass() {
            const elm = document.querySelector(`.${ACTIVECLASS}`);
            if (elm) {
                elm.classList.remove(ACTIVECLASS);
            }
        }

        function showNextImage() {
            removeActiveClass();
            currentIndex = (currentIndex + 1) % IMAGES.length;
            IMAGES[currentIndex].classList.add(ACTIVECLASS);
        }

        function showActiveImage() {
            removeActiveClass();
            IMAGES[currentIndex].classList.add(ACTIVECLASS);

            activeImageTimeout = setTimeout(() => {
                removeActiveClass();
                showNextImage();

                intervalId = setInterval(showNextImage, 3000);
            }, 6000);
        }

        setTimeout(showNextImage, 3000);
        intervalId = setInterval(showNextImage, 3000);

        IMAGES.forEach((image, index) => {
            image.addEventListener('click', () => {
                clearTimeout(activeImageTimeout);
                clearInterval(intervalId);
                currentIndex = index;
                showActiveImage();
            });
        });
    </script>
</body>
</html>
