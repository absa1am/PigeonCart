<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="w-2/3 mx-auto">
                        <div class=" shadow-md rounded my-6">
                            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                            <thead>
                                <tr class="bg-green-100">
                                <th class="text-left py-2 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                <th class="text-left py-2 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                                <th class="text-left py-2 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone</th>
                                <th class="text-left py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Time</th>
                                <th class="text-left py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr class="<?php if($contact->status == "Unread") echo "bg-blue-200" ?> hover:bg-grey-lighter">
                                    <td class="text-left py-4 px-6 border-b border-grey-light bg-grey-500">{{ $contact->name }}</td>
                                    <td class="text-left py-4 px-6 border-b border-grey-light bg-grey-500">{{ $contact->email }}</td>
                                    <td class="text-left py-4 px-6 border-b border-grey-light bg-grey-500">{{ $contact->phone }}</td>
                                    <td class="text-left py-4 px-6 border-b border-grey-light bg-grey-500">{{ $contact->created_at }}</td>
                                    <td class="text-left py-4 px-6 border-b border-grey-light bg-grey-500">
                                        <a href="{{ route('view-contact', ['id' => $contact->id]) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">View</a>
                                        <a href="{{ route('delete-contact', ['id' => $contact->id]) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>