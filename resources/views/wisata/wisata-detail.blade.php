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
                                    <iframe width="100%" height="400" frameborder="0"
                                            scrolling="no" marginheight="0" marginwidth="0"
                                            src="{{ $wisatas->google_maps_url }}">
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
                            {{-- <section
                                class="section mcb-section mfn-default-section mcb-section-yxzgwykka default-width">
                                <div class="mcb-background-overlay"></div>
                                <div
                                    class="section_wrapper mfn-wrapper-for-wraps mcb-section-inner mcb-section-inner-yxzgwykka">
                                    <div class="wrap mcb-wrap mcb-wrap-jq3fgk0h7 one-second tablet-one-second laptop-one-second mobile-one clearfix"
                                        data-desktop-col="one-second" data-laptop-col="laptop-one-second"
                                        data-tablet-col="tablet-one-second" data-mobile-col="mobile-one">
                                        <div
                                            class="mcb-wrap-inner mcb-wrap-inner-jq3fgk0h7 mfn-module-wrapper mfn-wrapper-for-wraps">
                                            <div class="mcb-wrap-background-overlay"></div>
                                            <div
                                                class="column mcb-column mcb-item-lcl2a3afc one laptop-one tablet-one mobile-one column_plain_text animate fadeInLeft">
                                                <div
                                                    class="mcb-column-inner mfn-module-wrapper mcb-column-inner-lcl2a3afc mcb-item-plain_text-inner">
                                                    <div class="desc">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap mcb-wrap mcb-wrap-f4822oubb one-second tablet-one-second laptop-one-second mobile-one clearfix"
                                            data-desktop-col="one-second" data-laptop-col="laptop-one-second"
                                            data-tablet-col="tablet-one-second" data-mobile-col="mobile-one">
                                            <div
                                                class="mcb-wrap-inner mcb-wrap-inner-f4822oubb mfn-module-wrapper mfn-wrapper-for-wraps">
                                                <div class="mcb-wrap-background-overlay"></div>
                                                <div
                                                    class="column mcb-column mcb-item-3mfjh8bxn one laptop-one tablet-one mobile-one column_column animate fadeInRight">
                                                    <div
                                                        class="mcb-column-inner mfn-module-wrapper mcb-column-inner-3mfjh8bxn mcb-item-column-inner">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="section mcb-section mfn-default-section mcb-section-itksubjfj default-width">
                                <div class="mcb-background-overlay"></div>
                                <div
                                    class="section_wrapper mfn-wrapper-for-wraps mcb-section-inner mcb-section-inner-itksubjfj">
                                    <div class="wrap mcb-wrap mcb-wrap-edxseg5q one-second tablet-one-second laptop-one-second mobile-one clearfix"
                                        data-desktop-col="one-second" data-laptop-col="laptop-one-second"
                                        data-tablet-col="tablet-one-second" data-mobile-col="mobile-one">
                                        <div
                                            class="mcb-wrap-inner mcb-wrap-inner-edxseg5q mfn-module-wrapper mfn-wrapper-for-wraps">
                                            <div class="mcb-wrap-background-overlay"></div>
                                            <div
                                                class="column mcb-column mcb-item-zyon7vkq one laptop-one tablet-one mobile-one column_column animate fadeInLeft">
                                                <div
                                                    class="mcb-column-inner mfn-module-wrapper mcb-column-inner-zyon7vkq mcb-item-column-inner">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap mcb-wrap mcb-wrap-8awbwwmq one-second tablet-one-second laptop-one-second mobile-one clearfix"
                                            data-desktop-col="one-second" data-laptop-col="laptop-one-second"
                                            data-tablet-col="tablet-one-second" data-mobile-col="mobile-one">
                                            <div
                                                class="mcb-wrap-inner mcb-wrap-inner-8awbwwmq mfn-module-wrapper mfn-wrapper-for-wraps">
                                                <div class="mcb-wrap-background-overlay"></div>
                                                <div
                                                    class="column mcb-column mcb-item-o6mo2c1u5 one laptop-one tablet-one mobile-one column_image animate fadeInRight">
                                                    <div
                                                        class="mcb-column-inner mfn-module-wrapper mcb-column-inner-o6mo2c1u5 mcb-item-image-inner">
                                                        <div
                                                            class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                            <div class="image_wrapper">
                                                                <img width="959" height="630"
                                                                    src="https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin.jpg"
                                                                    class="scale-with-grid"
                                                                    alt="taman labirin pelaihari" decoding="async"
                                                                    fetchpriority="high"
                                                                    srcset="https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin.jpg 959w, https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin-500x328.jpg 500w, https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin-300x197.jpg 300w, https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin-768x505.jpg 768w, https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin-114x75.jpg 114w, https://dispar.kalselprov.go.id/wp-content/uploads/2023/10/taman-labirin-480x315.jpg 480w"
                                                                    sizes="(max-width:767px) 480px, (max-width:959px) 100vw, 959px">
                                                            </div>
                                                            <p class="wp-caption-text">sumber foto dari
                                                                www.direktoripariwisata.id</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> --}}
                        </div>


                        <section class="section mcb-section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper "></div>
                            </div>
                        </section>

                        <section class="section section-page-footer">
                            <div class="section_wrapper clearfix">
                                <div class="column one page-pager">
                                    <div class="mcb-column-inner"></div>
                                </div>
                            </div>
                        </section>

                    </div>

                </main>

            </div>
        </div>

    </main>
</body>
<x-footer></x-footer>

</html>
