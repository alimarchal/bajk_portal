<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Circulars') }} For {{\App\Models\Division::find(9)->name}}
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('circular.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span class="hidden md:inline-block ml-2">Create Circular</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center mb-6">
                        <img class="m-auto rounded-lg border-10 border-gray-100" style="height: 300px;" src="{{\Illuminate\Support\Facades\Storage::url('president.jpeg')}}" alt="Profile Image">
                    </div>
                    <h2 class="text-3xl font-bold mb-2">Bank President</h2>
                    <p class="text-black text-sm">Bank of Azad Jammu & Kashmir</p>
                    <h2 class="text-3xl rtl text-right font-bold mb-2">
                        <a href="{{\Illuminate\Support\Facades\Storage::url('Message-from-the-President..pdf')}}">اردو میں پڑھیں</a>
                    </h2>
                    <p class="text-lg mb-6">
                        It is indeed a great privilege for me to be associated with Bank of Azad Jammu & Kashmir - an Institution which has all the prospects of a glorious future, an institution that is envisaged to play a pioneer role in the development of the banking industry in this region. We should all be proud of being associated with it. I also feel greatly inspired on working with you as one team to meet the challenges of tomorrow.
                    </p>
                    <p class="text-lg mb-6">
                        I want to take this opportunity to share with you my vision for BAJK going forward. It is simple; it is to become the pre-eminent provider of financial services within an area of present operations and also beyond in the future.
                    </p>
                    <p class="text-lg mb-6">
                        How will we get there? What resources will we need? How will we measure success? Let me very briefly address these issues. We will get there by reshaping our business plans in the light of very rapid changes in the external environment, our own industry, and the increasing choices available to our clients. More crucially we will execute and implement our plans with all our vigor and dedication. We will get there by deploying our scarce resources in investments needed for the future - in technology, in human resource development, and in creating a meritocratic culture.
                    </p>
                    <p class="text-lg mb-6">
                        Since onward our financial and operating results will be the judge of our success as will be our performance against competitors and crucially also what our customers think of us. As an institution, we have some enviable strengths - state ownership and a prestigious name, to provide the platform for leveraging our initiatives.
                    </p>
                    <p class="text-lg mb-6">
                        Let us enter the year 2020 with renewed commitment to concentrate on CASA Deposits and Quality Lending.
                    </p>
                    <p class="text-lg mb-6">
                        I am supremely confident that with teamwork, commitment to our jobs, and mutual trust and respect we will be more than equal to the challenges of tomorrow, In-Sha-Allah.
                    </p>
                    <p class="text-lg">
                        Wishing you all the best.
                        <br>
                        <span class="font-bold">(Khawar Saeed)</span>
                        <br>
                        President / CEO
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
