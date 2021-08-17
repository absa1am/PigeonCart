<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Messages') }}
        </h2>
    </x-slot>

<!-- This is an example component -->
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="h-full">
                        
                        <div class="border-b-2 block md:flex">
                            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
                            <div class="flex justify-between">
                                <p class="font-bold">Name: {{ $contact->name }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="font-bold">Phone: {{ $contact->phone }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="font-bold">Email: {{ $contact->email }}</p>
                            </div>
                            
                            <div class="w-full p-8 mx-2 flex justify-center">
                                <a href="{{ route('view-contacts') }}" class="text-green-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Return</a>
                                <a href="{{ route('delete-contact', ['id' => $contact->id]) }}" class="text-red-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">Delete</a>
                            </div>
                            </div>
                            
                            <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
                            <div class="rounded  shadow p-6">
                                <P class="text-xl text-center font-bold">Message</P>
                                <div class="pb-6">
                                    {{ $contact->message }}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>