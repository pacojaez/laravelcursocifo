<div class="flex flex-col p-5 m-5">
    <form action="{{ route('bike.search') }}" method="POST">
        @csrf
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <label for="marca" class="mb-3 block text-base font-medium text-[#07074D]">
                        MARCA
                    </label>
                    <input type="text" name="marca" id="marca" placeholder="Marca" value="{{ empty($marca)? '': $marca }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <label for="modelo" class="mb-3 block text-base font-medium text-[#07074D]">
                        MODELO
                    </label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo" value="{{ empty($modelo)? '': $modelo }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="w-full px-3 sm:w-1/2">
                <button type="submit">BUSCAR</button>
            </div>
    </form>
</div>
