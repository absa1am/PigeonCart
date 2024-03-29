@extends('layouts.home')

@section('title', 'Demo - Chekout')

@section('content')
    <main class="my-8">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
            <div class="flex flex-col lg:flex-row mt-8">
                <div class="w-full lg:w-1/2 order-2">
                    <div class="flex items-center">
                        <button class="flex text-sm text-blue-500 focus:outline-none"><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">1</span> Cart</button>
                        <button class="flex text-sm text-gray-700 ml-8 focus:outline-none"><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">2</span> Checkout</button>
                        <button class="flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span> Order</button>
                    </div>
                    <form method="POST" action="{{ route('update.address', ['id' => $user->id]) }}" class="mt-8 lg:w-3/4">
                        @csrf
                        <div>
                            <h4 class="text-sm text-gray-500 font-medium">Delivery method</h4>
                            <div class="mt-6">
                                <button class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none">
                                    <label class="flex items-center">
                                        <input type="radio" class="form-radio h-5 w-5 text-blue-600"><span class="ml-2 text-sm text-gray-700">Cash On Delivery</span>
                                    </label>

                                    <span class="text-gray-600 text-sm">50 Tk</span>
                                </button>
                            </div>

                            <div class="mt-6">
                                <button class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none">
                                    <label class="flex items-center">
                                        <input type="radio" class="form-radio h-5 w-5 text-blue-600"><span class="ml-2 text-sm text-gray-700">Cash on bKash</span>
                                    </label>

                                    <span class="text-gray-600 text-sm">50 Tk</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Delivery Information</h4>
                            <div class="mt-6 flex">
                                <label class="block w-3/12">
                                    City: <select class="form-select text-gray-700 mt-1 block w-full" name="city">
                                        <option value="Dhaka" <?php if($user->city == "Dhaka") echo "selected"; ?>>Dhaka</option>
                                        <option value="Tangail" <?php if($user->city == "Tangail") echo "selected"; ?>>Tangail</option>
                                        <option value="Rajshahi" <?php if($user->city == "Rajshahi") echo "selected"; ?>>Rajshahi</option>
                                        <option value="Khulna" <?php if($user->city == "Khulna") echo "selected"; ?>>Khulna</option>
                                        <option value="Chittagong" <?php if($user->city == "Chittagong") echo "selected"; ?>>Chittagong</option>
                                        <option value="Barisal" <?php if($user->city == "Barisal") echo "selected"; ?>>Barisal</option>
                                        <option value="Barisal" <?php if($user->city == "Barisal") echo "selected"; ?>>Cumilla</option>
                                        <option value="Rangpur" <?php if($user->city == "Rangpur") echo "selected"; ?>>Rangpur</option>
                                    </select>
                                </label>
                                <label class="block flex-1 ml-3">
                                    Phone: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="phone" value="{{ $user->phone }}">
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="mt-6 flex">
                                <label class="block w-3/12">
                                    ZIP: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="zip" value="{{ $user->zip }}">
                                </label>
                                <label class="block flex-1 ml-3">
                                    Address: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="address" value="{{ $user->address }}">
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <a href="{{ route('cart') }}" class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                <span class="mx-2">Back step</span>
                            </a>
                            <button class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Save Address</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center lg:justify-end">
                        <div class="border rounded-md max-w-md w-full px-4 py-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-700 font-medium">Order total ({{ $counts }})</h3>
                                <span class="text-gray-600 text-sm">Edit</span>
                            </div>
                            @foreach($carts as $cart)
                                <div class="flex justify-between mt-6">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded" src="\{{ $cart->product->image }}" alt="">
                                        <div class="mx-3">
                                            <h3 class="text-sm text-gray-600">{{ $cart->product->name }}</h3>
                                            <div class="flex items-center mt-2">
                                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                                <span class="text-gray-700 mx-2">{{ $cart->quantity }}</span>
                                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-gray-600">{{ $cart->product->price }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <form class="" action="{{ route('order') }}" method="POST">
                        @csrf
                        <div class="flex items-right justify-end mt-8">
                            <button class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Place Order</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
