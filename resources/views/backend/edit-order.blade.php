<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
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

                        <form method="POST" action="{{ route('update.order', ['id' => $order->id]) }}">
                            @csrf

                            <!-- Customer Name -->
                            <div>
                                <x-label for="name" :value="__('Cust. Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $order->user->name }}" disabled/>
                            </div>

                            <!-- Grand Total -->
                            <div class="mt-4">
                                <x-label for="grandtotal" :value="__('Grand Total')" />

                                <x-input id="grandtotal" class="block mt-1 w-full" type="text" name="grandtotal" value="{{ $order->grandtotal }}" required />
                            </div>

                            <label class="block">
                                <x-label for="status" :value="__('Order Status')" />

                                <select class="form-select block w-full mt-1" name="status">
                                    <option value="1" <?php echo $order->status == "Pending"? "selected":""; ?>>Pending</option>
                                    <option value="2" <?php echo $order->status == "Processing"? "selected":""; ?>>Processing</option>
                                    <option value="3" <?php echo $order->status == "Shipped"? "selected":""; ?>>Shipped</option>
                                    <option value="4" <?php echo $order->status == "Completed"? "selected":""; ?>>Completed</option>
                                    <option value="5" <?php echo $order->status == "Cancel"? "selected":""; ?>>Cancelled</option>
                                </select>
                            </label>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </form>
                    </x-auth-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
