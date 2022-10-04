<div>
    <ul class="block w-11/12 mx-auto my-4" x-data="{ selected: null }">
        <li class="flex flex-col align-center">
            <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                class="inline-block px-5 py-3 text-center text-white bg-indigo-300 rounded-t cursor-pointer hover:opacity-75 hover:shadow hover:-mb-3">
                NUESTRAS MARCAS
            </h4>
            <div x-show="selected == 0" class="px-2 py-4 border">
                <!-- begin: bike card -->
                <!-- alpine ajax -->
                <div class="h-full p-4 text-gray-800 bg-gray-200 lg:p-8" x-data="alpineInstance()" x-init="fetch('http://localhost:8000/api/marcasbikes')
                    .then(response => response.json())
                    .then(data => bikes = data)">
                    <h1 class="mt-0 mb-3 text-3xl font-light" x-text="title">
                        <!-- title text -->
                    </h1>
                    <div class="flex flex-wrap justify-center pb-8 -mx-2">
                        <!-- begin: bike card -->
                        <template x-for="bike in bikes" :key="bike.id">
                            <form action="{{ route('bike.search') }}" method="POST" class="flex flex-row">
                                @csrf
                                <div class="flex flex-col md:flex-row place-items-center">
                                    <div class="w-full px-3">
                                        <div class="mb-2">
                                            <input type="hidden" x-bind:placeholder="bike.marca" name="marca" id="marca" x-bind:value="bike.marca">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" x-html="bike.marca" class="hover:underline"></button>
                            </form>
                        </template>
                        <!-- end: bike card -->
                    </div>
                </div>
                <!-- end alpine component-->
                <!-- end: bike card -->
            </div>
        </li>
    </ul>
    <script>
        function alpineInstance() {
            return {
                title: '',
                intro: 'Implement a simple <code class="text-pink-600 text-md">fetch()</code> request to render a list of items using Alpine.js :)',
                bikes: [],
            }
        }
    </script>
</div>
