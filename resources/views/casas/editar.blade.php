<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Casas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('casas.update',$casa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre:</label>
                            <input name="nombre" value="{{$casa->nombre}}"
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" required />
                        </div>

                    </div>

                    <!-- Para ver la imagen seleccionada -->
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img id="imagenSeleccionada" src="{{ URL::asset('assents/img/' . $casa->imagen) }}" alt=""
                            style="max-height: 300px;">
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir
                            Imagen</label>
                        <div class='flex items-center justify-center w-full'>
                            <label
                                class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                        Seleccione la imagen</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="imagen" hidden id="imagen">
                                        @error('dos')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Descripción:</label>
                        <input name="descripcion" value="{{$casa->descripcion}}"
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" required />
                    </div>

                    <li class="form-line" data-type="control_dropdown" id="id_7">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Categorias</label>
                        <div id="cid_7" class="form-input-wide" data-layout="half">
                            <select class="form-dropdown" id="input_7" name="categories[]" style="width:310px"
                                data-component="dropdown" multiple>
                                @foreach($categories as $category)

                                <option value="{{$category->id}}" @if(in_array($category->id,
                                    array_column($casa->categorias->toArray(), 'id'))) selected @endif
                                    >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>

                    <br>

                    <label
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Clasificacion</label>
                    <br>
                    <select name="id_clasificacion" selected>
                        @foreach($clasifications as $clasification)
                        @if ($casa->clasificacion->id == $clasification->id)
                        <option value="{{ $clasification->id }}" selected>{{ $clasification->name }}</option>
                        @else
                        <option value="{{ $clasification->id}}">{{$clasification->name }}</option>
                        @endif

                        @endforeach
                    </select>


                    </select>
                    <br>
                    <div class="grid grid-cols-1">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Precio:</label>
                        <input name="precio" value="{{$casa->precio}}"
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" required />
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('casas.index') }}"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        $('#imagen').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
