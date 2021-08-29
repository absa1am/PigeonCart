<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    @if(Session::has('message'))
                      <div class="mb-4 bg-green-100 text-green-900 rounded-md border border-green-200 flex flex-col" role="alert">
                          <div class="py-2 px-5 text-sm">
                              {{ Session::get('message') }}
                          </div>
                      </div>
                    @endif
                    <div class="flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category Name
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category Slug
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                  @foreach($categories as $category)
                                    <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $category->name }}
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              {{ $category->slug }}
                                            </div>
                                          </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                              <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                <a href="{{ route('edit.category', ['id' => $category->id]) }}">Edit</a>
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
                                                        <p class="text-red text-2xl font-bold">Danger Warning!</p>
                                                        <div class="modal-close cursor-pointer z-50">
                                                          <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                          </svg>
                                                        </div>
                                                      </div>

                                                      <!--Body-->
                                                      <p>Are you sure ? You want to delete this category.</p>
                                                      <p>Remember, deleted category, associate cart and</p>
                                                      <p>ordered product can't be restore.</p>

                                                      <!--Footer-->
                                                      <div class="flex justify-end pt-2">
                                                        <a class="px-4 bg-transparent p-3 rounded-lg text-black-500 hover:bg-red-400 hover:text-white-400 mr-2" href="{{ route('delete.category', ['id' => $category->id]) }}">Delete</a>
                                                        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                                                      </div>
                                                    </div>
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
