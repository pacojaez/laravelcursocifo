@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>FORM REQUEST</h2>
        </div>
        <x-code>
            <a href="https://laravel.com/docs/9.x/validation#form-request-validation" target="_blank"
                rel="noopener noreferrer">
                <p>
                    https://laravel.com/docs/9.x/validation#form-request-validation
                </p>
            </a>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>con php artisan </h2>
        </div>
        <x-code>
            <p>
                php artisan make:request BikeRequest
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Se crea el Folder REQUEST dentro de APP/HTTP </h2>
        </div>
        <x-code>
            <p>
                Request [C:\xampp\htdocs\laravelcursocifo\app/Http/Requests/BikeRequest.php] created successfully.
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>Como estoy usando el stub de Spatie para sobrescribir los archivos que me genera artisan mi FormRequest sólo
                tiene el método rules() y no tiene el método authorize() </h2>
        </div>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2> Dentro del método rules() colocamos las reglas de validación que estaban en el controlador BikeController
            </h2>
        </div>
        <x-code>
            <p>
                public function rules(): array<br>
                {<br>
                return [<br>
                'marca' =>'required|max:255',<br>
                'modelo' =>'required|max:255',<br>
                'kms' =>'required|integer',<br>
                'caballos' =>'required|max:255',<br>
                'color' =>'required|max:255',<br>
                'matriculada' =>'required_with:matricula',<br>
                'matricula' =>'required_if:matriculada, 1|<br>
                nullable|<br>
                regex:/^\d{4}[B-Z]{3}$/i|<br>
                unique:bikes',<br>
                'precio' =>'required|numeric',<br>
                'image' => 'sometimes|file|image|mimes:jpg,gif,png,webp|max:2048'<br>
                ];<br>
                }<br>
            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Y en el método store() del controlador le inyectamos la BikeRequest. Conseguimos controladores mucho más
                manejables así
            </h2>
        </div>
        <x-code>
            <p>
                use App\Http\Requests\BikeRequest;<br>
                public function store(BikeRequest $request) <br>
                {<br>

            </p>
        </x-code>
    </div>
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Personalizando los mensajes de error de nuestro BikeRequest, por ejemplo
            </h2>
            <br>
            <a href="https://laravel.com/docs/9.x/validation#customizing-the-error-messages" target="blank">
                https://laravel.com/docs/9.x/validation#customizing-the-error-messages
            </a>
        </div>
        <x-code>
            <p>
                public function messages()<br>
                {<br>
                return [<br>
                'matricula.required' => 'Debes poner la matrícula de la moto',<br>
                'color.required' => 'Debe de ser un color incluido en el arco iris',<br>
                ];<br>
                }<br>
            </p>
        </x-code>
    </div>

    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2>
                Creando una clase que herede de BikeRequest para el update. Sobrecribe la regla para matricula y hereda el resto del parent::rules()
            </h2>
        </div>
        <x-code>
            <p>
                public function rules(): array<br>
                {<br>
                $id = $this->bike->id;<br>
                return [<br>
                'matricula' =>"required_if:matriculada, 1|<br>
                nullable|<br>
                regex:/^\d{4}[B-Z]{3}$/i|<br>
                unique:bikes,matricula, $id",<br>
                ]+parent::rules();<br>
                }<br>
            </p>
        </x-code>
    </div>


@endsection
