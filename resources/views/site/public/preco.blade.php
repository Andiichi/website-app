@extends('site/layout')

@section('title', 'Preços')

@section('conteudo')

    <x-site.alert />

    <div class="grid md:grid-cols-1 items-center md:gap-4 mb-0 gap-8 font-[sans-serif] max-w-5xl max-md:max-w-md mx-auto">
        <div class="max-md:order-1 max-md:text-center">

                
            <h3 class="text-gray-800 md:text-6xl text-2xl md:leading-10">
                < Nossos preços! />
            </h3>
       
            <div class="font-sans p-4 mt-10">
                <ul class="flex">
                    <li id="homeTab"
                        class="tab text-blue-600 font-bold text-base text-center bg-gray-50 py-3 px-6 border-b-2 border-blue-600 cursor-pointer transition-all">
                        Home
                    </li>
                    <li id="contentTab"
                        class="tab text-gray-600 font-semibold text-base text-center hover:bg-gray-50 py-3 px-6 border-b-2 cursor-pointer transition-all">
                        Content
                    </li>
                    <li id="profileTab"
                        class="tab text-gray-600 font-semibold text-base text-center hover:bg-gray-50 py-3 px-6 border-b-2 cursor-pointer transition-all">
                        Profile
                    </li>
                </ul>
            
                <div id="homeContent" class="tab-content max-w-2xl block mt-8">
                    <h4 class="text-lg font-bold text-gray-600">Home</h4>
                    <p class="text-sm text-gray-600 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed auctor auctor arcu, at fermentum dui.
                        Maecenas vestibulum a turpis in lacinia.
                        Proin aliquam turpis at erat venenatis malesuada.
                    </p>
                </div>
                <div id="contentContent" class="tab-content max-w-2xl hidden mt-8">
                    <h4 class="text-lg font-bold text-gray-600">Content</h4>
                    <p class="text-sm text-gray-600 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed auctor auctor arcu, at fermentum dui.
                        Maecenas vestibulum a turpis in lacinia.
                        Proin aliquam turpis at erat venenatis malesuada.
                        Sed semper, justo vitae consequat fermentum, felis diam posuere ante, sed fermentum quam justo in dui.
                    </p>
                </div>
                <div id="profileContent" class="tab-content max-w-2xl hidden mt-8">
                    <h4 class="text-lg font-bold text-gray-600">Profile</h4>
                    <p class="text-sm text-gray-600 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed auctor auctor arcu, at fermentum dui.
                        Maecenas vestibulum a turpis in lacinia.
                    </p>
                </div>
            </div>
    </div>

@endsection
