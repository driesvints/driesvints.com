<div id="header" class="bg-black relative text-lg">
    <div class="{{ isset($small) ? '' : 'max-w-8xl m-auto' }} bg-cover bg-no-repeat" style="background-image: url('/assets/images/{{ isset($small) ? 'header-black' : 'header' }}.jpg'); background-position: {{ isset($small) ? 'top right' : '0 25%' }}">
        <div class="header-image {{ isset($small) ? 'header-image-small' :  'bg-black-opacity-40 lg:bg-transparent' }}">
            <div class="text-white py-6 {{ isset($small) ? 'pb-2 sm:pb-12' : 'pb-24' }}">
                <div class="{{ isset($small) ? 'max-w-8xl m-auto' : '' }} sm:flex text-center px-6 sm:px-12">
                    <div class="sm:flex-1 text-2xl font-bold sm:text-left mb-4">
                        <a href="/" class="hover:underline">Dries Vints</a>
                    </div>
                    <div class="sm:flex-2 sm:text-right">
                        @include('_partials.social')
                    </div>
                </div>

                <div class="content sm:max-w-lg mx-auto text-shadow-lg font-semibold px-6 mt-16 md:mr-0 xl:mr-24">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <svg class="absolute z-0 left-0 bottom-0 block w-full h-8 sm:h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon fill="#f7fafc" points="0,100 100,0 100,100"/>
    </svg>
</div>
