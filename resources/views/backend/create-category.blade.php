<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-card>
                        <x-slot name="logo">
                            <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a>
                        </x-slot>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('store.category') }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Slug Name -->
                            <div class="mt-4">
                                <x-label for="slug" :value="__('Slug')" />

                                <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Create') }}
                                </x-button>
                            </div>
                        </form>
                    </x-auth-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
