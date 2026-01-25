@include('nav')
<div class="container mx-auto lg:py-12 lg:px-20 md:py-8 md:px-6 py-6 px-4">
    <div class="flex flex-col lg:flex-row justify-between gap-6 lg:gap-8">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-8 sm:leading-9 text-gray-800 pb-4">{{ __('About Us') }}</h1>
              
                <ul class="font-normal text-xs sm:text-sm lg:text-base leading-5 sm:leading-6 text-gray-600 space-y-3">
                <li>Ibrahim, coded Shoply's backbone. His PHP Laravel scripts were elegant, but his coffee addiction was legendary. ("If the database doesn't scale, I won't either.")</li>
                <li>Montaser, the hype man, handled marketing. His slogan—"Shoply: Where Your Wallet Cries, But Proudly"—went viral after he convinced a local influencer to unbox a pharaonic-themed mousepad.</li>
                <li>Abood, the pragmatic project manager, kept deadlines alive. He translated Ibrahim's tech jargon, soothed concerns, and managed Montaser's "brilliant" ideas.</li>
                <li>Opada's the UI/UX perfectionist, agonized over gradients and micro-interactions. "Users will feel the 'Add to Cart' button," he insisted.</li>
                </ul>
        
        </div>
        <div class="w-full lg:w-7/12 h-auto lg:h-96">
            <img class="w-full h-full object-cover rounded-lg" src="{{ URL('images/group.jpg') }}" alt="A group of People" />
        </div>
    </div>

    <div class="flex flex-col lg:flex-row justify-between gap-6 lg:gap-8 pt-8 md:pt-12">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-8 sm:leading-9 text-gray-800 pb-4">{{ __('Our Story') }}</h1>
            <p class="font-normal text-xs sm:text-sm lg:text-base leading-5 sm:leading-6 text-gray-600">Two days before launch, disaster struck. During testing, Shoply's payment system charged users twice. Ibrahim blamed a "tiny" code typo. Montaser nearly shaved his beard off in stress. Abood, ever calm, ordered everyone to sleep—then debugged the glitch himself, fueled by hibiscus tea and spite.
            Opada, meanwhile, livestreamed the chaos. "Watch us fail gloriously!" he laughed, accidentally attracting 10k viewers. The comments section became a meme goldmine: "Shoply: We break systems, not prices!"</p>
        </div>
        <div class="w-full lg:w-7/12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-3 lg:gap-4 shadow-lg rounded-md p-4">
                <div class="p-3 sm:p-4 pb-4 sm:pb-6 flex flex-col justify-center items-center text-center">
                    <img class="w-full h-32 sm:h-40 lg:h-60 rounded-md bg-gray-200 object-cover hover:scale-110 transition duration-300" src="{{ URL('images/ibrahim.jpg') }}" alt="Ibrahim" />
                    <p class="font-medium text-sm sm:text-base lg:text-xl leading-5 text-gray-800 mt-3 sm:mt-4">Ibrahim</p>
                </div>
                <div class="p-3 sm:p-4 pb-4 sm:pb-6 flex flex-col justify-center items-center text-center">
                    <img class="w-full h-32 sm:h-40 lg:h-60 rounded-md bg-gray-200 object-cover hover:scale-110 transition duration-300" src="{{ URL('images/abood.jpg') }}" alt="Abood" />
                    <p class="font-medium text-sm sm:text-base lg:text-xl leading-5 text-gray-800 mt-3 sm:mt-4">Abood</p>
                </div>
                <div class="p-3 sm:p-4 pb-4 sm:pb-6 flex flex-col justify-center items-center text-center">
                    <img class="w-full h-32 sm:h-40 lg:h-60 rounded-md bg-gray-200 object-cover hover:scale-110 transition duration-300" src="{{ URL('images/montaser.png') }}" alt="Montaser" />
                    <p class="font-medium text-sm sm:text-base lg:text-xl leading-5 text-gray-800 mt-3 sm:mt-4">Montaser</p>
                </div>
                <div class="p-3 sm:p-4 pb-4 sm:pb-6 flex flex-col justify-center items-center text-center">
                    <img class="w-full h-32 sm:h-40 lg:h-60 rounded-md bg-gray-200 object-cover hover:scale-110 transition duration-300" src="{{ URL('images/opada.jpg') }}" alt="Opada" />
                    <p class="font-medium text-sm sm:text-base lg:text-xl leading-5 text-gray-800 mt-3 sm:mt-4">Opada</p>
                </div>
            </div>
        </div>
    </div>
</div>
