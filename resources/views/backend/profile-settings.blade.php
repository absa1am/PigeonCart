<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                                <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
                                  <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                                      <div class="inline-flex items-center space-x-4">
                                        <img
                                          class="w-10 h-10 object-cover rounded-full"
                                          alt="User avatar"
                                          src="https://avatars3.githubusercontent.com/u/72724639?s=400&u=964a4803693899ad66a9229db55953a3dbaad5c6&v=4"
                                        />

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
                                          <label class="text-sm text-gray-400">Full Name</label>
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
                                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                              placeholder="{{ $user->name }}"
                                            />
                                          </div>
                                        </div>
                                        <div>
                                          <label class="text-sm text-gray-400">Phone Number</label>
                                          <div class="w-full inline-flex border">
                                            <div class="pt-2 w-1/12 bg-gray-100">
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
                                                  d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                                                />
                                              </svg>
                                            </div>
                                            <input
                                              type="text"
                                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                              placeholder="12341234"
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <hr />
                                    <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">
                                      <h2 class="md:w-4/12 max-w-sm mx-auto">Change Password</h2>

                                      <div class="md:w-5/12 w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">
                                        <div class="w-full inline-flex border-b">
                                          <div class="w-1/12 pt-2">
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
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                                            placeholder="New"
                                          />
                                        </div>
                                      </div>

                                      <div class="md:w-3/12 text-center md:pl-6">
                                        <button class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
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

                                    <hr />
                                    <div class="w-full p-4 text-right text-gray-500">
                                      <button class="inline-flex items-center focus:outline-none mr-4">
                                        <svg
                                          fill="none"
                                          class="w-4 mr-2"
                                          viewBox="0 0 24 24"
                                          stroke="currentColor"
                                        >
                                          <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                          />
                                        </svg>
                                        Delete account
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