<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order ID
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Time
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                  @foreach($orders as $order)
                                    <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $order->id }}
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $order->status }}
                                            </div>
                                          </div>
                                      </td>

                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $order->grandtotal }}
                                            </div>
                                          </div>
                                      </td>

                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $order->created_at }}
                                            </div>
                                          </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              @if($order->status == "Cancelled")
                                                <button class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                  <a href="{{ route('reorder.order', ['id' => $order->id]) }}">Re Order</a>
                                                </button>
                                              @endif

                                              @if($order->status != "Shipped" && $order->status != "Cancelled")
                                                <button class="modal-open bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                  <a href="{{ route('cancel.order', ['id' => $order->id]) }}">Cancel</a>
                                                </button>
                                              @endif
                                            </div>
                                          </div>
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
        </div>
    </div>
</x-app-layout>
