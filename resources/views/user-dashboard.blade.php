<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Settings') }}
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
                          <!-- component -->
                          <section class="py-40 bg-gray-100  bg-opacity-50 h-screen">
                              <form method="POST" action="{{ route('update-settings', ['id' => Auth::user()->id]) }}">
                                @csrf
                                <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
                                  <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                                      <div class="inline-flex items-center space-x-4">
                                        <h1 class="text-gray-600">{{ $user->name }}</h1>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="bg-white space-y-6">
                                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                                      <h2 class="md:w-1/3 max-w-sm mx-auto">Account</h2>
                                      <div class="md:w-2/3 max-w-sm mx-auto">
                                        <label class="text-sm text-gray-400">Email</label>
                                        <div class="w-full inline-flex border">
                                          <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                            <svg
                                              fill="none"
                                              class="w-6 text-gray-400 mx-auto"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                            >
                                              <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                              />
                                            </svg>
                                          </div>
                                          <input
                                            type="email"
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                            placeholder="{{ $user->email }}"
                                            disabled
                                          />
                                        </div>
                                      </div>
                                    </div>

                                    <hr />
                                    <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                                      <h2 class="md:w-1/3 mx-auto max-w-sm">Personal Info</h2>
                                      <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                                        <div>
                                          <label class="text-sm text-gray-400">Name</label>
                                          <div class="w-full inline-flex border">
                                            <div class="w-1/12 pt-2 bg-gray-100">
                                              <svg
                                                fill="none"
                                                class="w-6 text-gray-400 mx-auto"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                              >
                                                <path
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                />
                                              </svg>
                                            </div>
                                            <input
                                              type="text"
                                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2" name="name" value="{{ $user->name }}"
                                              placeholder="John Doe"
                                            />
                                          </div>
                                        </div>

                                        <div>
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
                                                  Phone: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="phone" value="{{ $user->phone }}" placeholder="01XXXXXXXXX">
                                              </label>
                                          </div>
                                        </div>

                                        <div>
                                          <div class="mt-8">
                                              <div class="mt-6 flex">
                                                  <label class="block w-3/12">
                                                      ZIP: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="zip" value="{{ $user->zip }}" placeholder="1234">
                                                  </label>
                                                  <label class="block flex-1 ml-3">
                                                      Address: <input type="text" class="form-input mt-1 block w-full text-gray-700" name="address" value="{{ $user->address }}" placeholder="Shipping address here...">
                                                  </label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <hr />
                                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                                      <h2 class="md:w-1/3 max-w-sm mx-auto">Change Password</h2>
                                      <div class="md:w-2/3 max-w-sm mx-auto">
                                        <label class="text-sm text-gray-400">New Password</label>
                                        <div class="w-full inline-flex border">
                                          <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                            <svg
                                              fill="none"
                                              class="w-6 text-gray-400 mx-auto"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                            >
                                              <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                              />
                                            </svg>
                                          </div>
                                          <input
                                            type="password"
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" name="pass"
                                            placeholder="******"
                                          />
                                        </div>

                                        <label class="text-sm text-gray-400">Confirm Password</label>
                                        <div class="w-full inline-flex border">
                                          <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                            <svg
                                              fill="none"
                                              class="w-6 text-gray-400 mx-auto"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                            >
                                              <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                              />
                                            </svg>
                                          </div>
                                          <input
                                            type="password"
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" name="npass"
                                            placeholder="******"
                                          />
                                        </div>
                                      </div>
                                    </div>
                                    <hr />
                                    <div class="w-full p-4 text-center text-gray-500">
                                        <button class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-center">
                                          <svg
                                            fill="none"
                                            class="w-4 text-white mr-2"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                          >
                                            <path
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                            />
                                          </svg>
                                          Update
                                        </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </section>
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
