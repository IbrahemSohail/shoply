@include('link')
@include('nav')
<div class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">
    <div class="flex flex-col lg:flex-row justify-between gap-8">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">About Us</h1>
              
                <ul class="font-normal text-base leading-6 text-gray-600 dark:text-white">
                <li>Ibrahim, coded Shoply’s backbone. His PHP Laravel scripts were elegant, but his coffee addiction was legendary. (“If the database doesn’t scale, I won’t either.”)
                </li>
                <br>
                <li>Montaser, the hype man, handled marketing. His slogan—“Shoply: Where Your Wallet Cries, But Proudly”—went viral after he convinced a local influencer to unbox a pharaonic-themed mousepad.</li>
              <br>
                <li>   Abood, the pragmatic project manager, kept deadlines alive. He translated Ibrahim’s tech jargon, soothed 
                </li>
<br>
                <li>
                    Opada's the UI/UX perfectionist, agonized over gradients and micro-interactions. “Users will feel the ‘Add to Cart’ button,” he insisted, while Opada rolled his eyes..</li>
                </li>
                </ol>
        
        </div>
        <div class="w-1/2 h-1/2 lg:w-8/12">
            <img class="w-full h-full" src="{{ URL('images/group.jpg') }}" alt="A group of People" />
        </div>
    </div>

    <div class="flex lg:flex-row flex-col justify-between gap-8 pt-12">
        <div class="w-full lg:w-5/12 flex flex-col justify-center">
            <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">Our Story</h1>
            <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">Two days before launch, disaster struck. During testing, Shoply’s payment system charged users twice. Ibrahim blamed a “tiny” code typo. Montaser nearly shaved his beard off in stress. Abood, ever calm, ordered everyone to sleep—then debugged the glitch himself, fueled by hibiscus tea and spite.
            Opada, meanwhile, livestreamed the chaos. “Watch us fail gloriously!” he laughed, accidentally attracting 10k viewers. The comments section became a meme goldmine: “Shoply: We break systems, not prices!”</p>
        </div>
        <div class="w-full lg:w-8/12 lg:pt-8">
            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-4 shadow-lg rounded-md">
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60  hover:scale-150 transition duration-1000" src="{{ URL('images/ibrahim.jpg') }}" alt="Alexa featured Image" />
                    
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Ibrahim</p>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60  hover:scale-150 transition duration-1000" src="{{ URL('images/abood.jpg') }}" alt="Olivia featured Image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Abood</p>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60  hover:scale-150 transition duration-1000" src="{{ URL('images/montaser.png') }}" alt="Liam featued Image" />
                   
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Montaser</p>
                </div>
                <div class="p-4 pb-6 flex justify-center flex-col items-center">
                    <img class="md:block hidden w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-60  hover:scale-150 transition duration-1000" src="{{ URL('images/opada.jpg') }}" alt="Elijah featured image" />
                    <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Opada</p>
                </div>
            </div>
        </div>
    </div>
</div>
