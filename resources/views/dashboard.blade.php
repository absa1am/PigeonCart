<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-indigo-50 flex-grow py-12 px-10">
                        <div class="flex space-x-10">
                            <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                            <div>
                                <span class="text-sm font-semibold text-gray-400">New Order</span>
                                <h1 class="text-2xl font-bold">{{ $orders }}</h1>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                                </svg>
                            </div>
                            </div>
                            <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                            <div>
                                <span class="text-sm font-semibold text-gray-400">Total Sales</span>
                                <h1 class="text-2xl font-bold">{{ $sales }}</h1>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            </div>
                            <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                            <div>
                                <span class="text-sm font-semibold text-gray-400">New Customer</span>
                                <h1 class="text-2xl font-bold">{{ $user }}</h1>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                            </div>
                            </div>
                            <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                            <div>
                                <span class="text-sm font-semibold text-gray-400">Total Customer</span>
                                <h1 class="text-2xl font-bold">{{ $totalUser }}</h1>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            </div>
                        </div>
                        <div class="flex mt-10 space-x-10">
                            <div class="bg-white w-full p-8 flex items-center justify-around rounded-xl shadow-lg">
                            <!-- This example requires Tailwind CSS v2.0+ -->

                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cust. Name
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Grand Total
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Creation Time
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Status
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($totalOrders as $order)
                                  <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="flex items-center">
                                        <div class="ml-4">
                                          <div class="text-sm font-medium text-gray-900">
                                            {{ $order->user->name }}
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">{{ $order->grandtotal }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                          {{ $order->created_at }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                      {{ $order->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                          <a href="{{ route('edit.order', ['id' => $order->id]) }}">Edit</a>
                                        </button>
                                        <button class="modal-open bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                          Delete
                                        </button>
                                          <!--Modal-->
                                          <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                            
                                            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                              
                                              <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                </svg>
                                                <span class="text-sm">(Esc)</span>
                                              </div>

                                              <!-- Add margin if you want to see some of the overlay behind the modal-->
                                              <div class="modal-content py-4 text-left px-6">
                                                <!--Title-->
                                                <div class="flex justify-between items-center pb-3">
                                                  <p class="text-2xl font-bold">Danger Warning!</p>
                                                  <div class="modal-close cursor-pointer z-50">
                                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                      <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                    </svg>
                                                  </div>
                                                </div>

                                                <!--Body-->
                                                <p>Are you sure ? You want to delete this product.</p>
                                                <p>Remember, deleted product, associate cart and</p>
                                                <p>ordered product can't be restore.</p>

                                                <!--Footer-->
                                                <div class="flex justify-end pt-2">
                                                  <a class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" href="{{ route('delete.order', ['id' => $order->id]) }}">Delete</a>
                                                  <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                  </tr>
                                @endforeach
                                <!-- More items... -->
                              </tbody>
                            </table>
                          </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      var openmodal = document.querySelectorAll('.modal-open')
      for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModal()
        })
      }
      
      const overlay = document.querySelector('.modal-overlay')
      overlay.addEventListener('click', toggleModal)
      
      var closemodal = document.querySelectorAll('.modal-close')
      for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
      }
      
      document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
        isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
        }
      };
      
      function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
      }
  </script>
</x-app-layout>
